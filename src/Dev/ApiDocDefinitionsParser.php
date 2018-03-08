<?php


namespace alexshadie\TelegramBot\Dev;


class ApiDocDefinitionsParser
{
    const TELEGRAM_API_DOC_URL = "https://core.telegram.org/bots/api";
    /** @var \phpQuery */
    private $document;

    /** @var string[] */
    private $types = [];
    /** @var ApiDocBlock[] */
    private $blocks = [];
    /** @var string[] */
    private $files = [];
    /** @var string[] */
    private $fullFiles = [];

    public function __construct()
    {
        $webpageContent = file_get_contents(self::TELEGRAM_API_DOC_URL);
        $this->document = \phpQuery::newDocument($webpageContent);
    }

    public function parse()
    {
        $content = $this->document->find('#dev_page_content');
//        $content->find();
        $html = str_replace("<h4>", "##END####BEGIN##<h4>", $content->html());
        $matches = [];
        preg_match_all("!##BEGIN##(.+)##END!Uism", $html . "##END##", $matches);

        $this->blocks = [];

        foreach ($matches[1] as $text) {
            $this->blocks[] = new ApiDocBlock($text);
        }


        /** @var ApiDocBlock $block */
        foreach ($this->blocks as $block) {
            if ($block->getType() === 'object') {
                $this->types[] = $block->getName();
            }
        }


        foreach ($this->blocks as $block) {
            if ($block->getType() === 'method') {
                $block->recognizeReturnType($this->types);
            }
        }
    }

    private function getDirContents($dir, &$results = array())
    {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
                $results[] = $path;
            } else if ($value != "." && $value != "..") {
                $this->getDirContents($path, $results);
//                $results[] = $path;
            }
        }

        return $results;
    }

    public function loadFiles()
    {
        $root = realpath(__DIR__ . "/../");
        foreach ($this->getDirContents($root) as $filename) {
            $this->files[str_replace(".php", "", basename($filename))] = str_replace(realpath(__DIR__ . "/../") . "/", "", $filename);
            $this->fullFiles[str_replace(".php", "", basename($filename))] = $filename;
        }
    }

    public function buildObjectFiles()
    {
        foreach ($this->blocks as $block) {
            if ($block->getType() == 'object') {
                echo $block->getName() . " - " . ($this->files[$block->getName()] ?? "no file") . "\n\n";
                [$fileContents, $testFileContents] = $this->getFile($block, ($this->files[$block->getName()] ?? null));
//                echo $fileContents . "\n\n";
                var_dump($this->fullFiles[$block->getName()] ?? realpath(__DIR__ . "/../Misc/") . "/{$block->getName()}.php");
                file_put_contents(
                    $this->fullFiles[$block->getName()] ?? realpath(__DIR__ . "/../Misc/") . "/{$block->getName()}.php",
                    $fileContents
                );

                $testFilename = str_replace("/src/", "/tests/", $this->fullFiles[$block->getName()] ?? realpath(__DIR__ . "/../Misc/") . "/{$block->getName()}.php");
                $testDirName = preg_replace('!/[a-z0-9]+\.php$!i', '/', $testFilename);

                if (!is_dir($testDirName)) {
                    mkdir($testDirName, 0755, true);
                }
                file_put_contents(
                    $testFilename,
                    $testFileContents
                );
            }
        }
    }

    public function splitLineByChunks($line, $maxlen = 120)
    {
        $result = [];
        while (strlen($line) > $maxlen) {
            for ($i = $maxlen; $line[$i] != " " && $i > 0; $i--);

            if ($i > 0) {
                $result[] = substr($line, 0, $i);
                $line = substr($line, $i + 1);
            }
        }
        $result[] = $line;
        return $result;
    }

    private function getNamespace($typename)
    {
        return "alexshadie\\TelegramBot\\" . $this->getNsType(str_replace(["/", ".php"], ["\\", ""], $this->files[$typename] ?? "Misc/{$typename}.php"));
    }

    private function getCoreType($typename)
    {
        if ($typename == "Integer" || $typename == "int") return "int";
        if ($typename == "String" || $typename == "string") return "string";
        if ($typename == "Array of String") return "string[]";
        if ($typename == "Boolean" || $typename == "True") return 'bool';
        if ($typename == "Float" || $typename == "Float number") return "float";
        return null;
    }

    private function getDocType($typename)
    {
        if ($this->getCoreType($typename)) {
            return $this->getCoreType($typename);
        }
        if (strpos($typename, "Array of ") !== false) {
            return str_replace("Array of ", "", $typename) . "[]";
        }
        return $typename;
    }

    private function getNsType($typename)
    {
        if ($this->getCoreType($typename)) {
            return $this->getCoreType($typename);
        }
        if (strpos($typename, "Array of ") !== false) {
            return str_replace("Array of ", "", $typename);
        }
        return $typename;
    }

    private function getRetType($typename)
    {
        if ($this->getCoreType($typename)) {
            if (strpos($this->getCoreType($typename), "[]") !== false) {
                return "array";
            }
            return $this->getCoreType($typename);
        }
        if (strpos($typename, "Array of ") !== false) {
            return "array";
        }
        return $typename;
    }

    private function underscoreToCamelCase($string, $lcfirst = false)
    {
        $string = explode("_", $string);
        $string = implode("", array_map('ucfirst', $string));
        if ($lcfirst) {
            $string = lcfirst($string);
        }
        return $string;
    }

    public function getFile(ApiDocBlock $block, $file)
    {
        if (!$file) {
            $file = "Misc/" . $block->getName();
        }

        $classInfo = [
            'ns' => "alexshadie\\TelegramBot\\" . str_replace(["/", "\\".$block->getName() . ".php"], ["\\", ""], $file),
            'name' => $block->getName(),
            'props' => []
        ];

        $header = [];
        $use = [];
        $class = [];
        $props = [];
        $ctor = [];
        $ctorDoc = [];
        $ctorArgs = [];
        $ctorBody = [];
        $getters = [];
        $methods = [];
        $create = [];

        $testClass = [];
        $testMethods = [];


        $thisns = "alexshadie\\TelegramBot\\" . str_replace(["/", "\\".$block->getName() . ".php"], ["\\", ""], $file);

        $header = ["<?php", "", "namespace {$thisns};", ""];
        if ($thisns !== "alexshadie\TelegramBot\Objects") {
            $use["Object"] = "use " . $this->getNamespace("Object") . ";";
        }
        $ctorDoc[] = "    /**";
        $ctorDoc[] = "     * {$block->getName()} constructor.";
        $ctorDoc[] = "     *";

        $class[] = "/**";
        $desc = explode("\n", $block->getDescription());
        foreach ($desc as $lines) {
            foreach ($this->splitLineByChunks($lines, 117) as $line) {
                $class[] = " * " . $line;
            }
            $class[] = " *";
        }
        $class[] = " */";
        $class[] = "class {$block->getName()} extends Object";
        $class[] = "{";

        $testClass[] = "class Test{$block->getName()} extends TestCase";
        $testClass[] = "{";

        $create[] = "    /**";
        $create[] = "      * Creates " . $block->getName() . " object from data.";
        $create[] = "      * @param \stdClass \$data";
        $create[] = "      * @return " . $block->getName();
        $create[] = "      */";
        $create[] = "    public static function createFromObject(?\stdClass \$data): ?" . $block->getName();
        $create[] = "    {";
        $create[] = "        if (is_null(\$data)) {";
        $create[] = "            return null;";
        $create[] = "        }";
        $create[] = "        \$object = new " . $block->getName() . "();";

        if ($block->getArgs()) {
            foreach ($block->getArgs() as $property) {
                $propInfo = [
                    'name' => $property['name'],
                    'uCcName' => $this->underscoreToCamelCase($property['name']),
                    'lCcName' => $this->underscoreToCamelCase($property['name'], true),
                    'type' => $property['type'],
                    'isCore' => $this->getCoreType($property['type']),
                    'phpDocType' => $this->getDocType($property['type']) . ($property['optional'] ? "|null" : ""),
                    'nsType' => $this->getNsType($property['type']),
                    'ns' => $this->getNamespace($this->getNsType($property['type'])),
                    'retType' => ($property['optional'] ? "?" : "") . $this->getRetType($property['type']),
                    'optional' => $property['optional'],
                ];

                $classInfo['props'][] = $propInfo;

                $props[] = "    /**";
                $getters[] = "    /**";

                $desc = explode("\n", $property['description']);
                foreach ($desc as $lines) {
                    foreach ($this->splitLineByChunks($lines, 117) as $line) {
                        $props[] = "     * " . $line;
                        $getters[] = "     * " . $line;
                    }
                    $props[] = "     *";
                    $getters[] = "     *";
                }

                $props[] = "     * @var " . $propInfo['phpDocType'];
                $getters[] = "     * @return " . $propInfo['phpDocType'];

                if (!$propInfo['isCore'] && $propInfo['nsType'] != $block->getName()) {
                    // Same namespace - do not include
                    if (strpos($propInfo['ns'], $thisns) === 0 && strpos(str_replace($thisns . "\\", "", $propInfo['ns']), "\\") === false) {

                    } else {
                        $use[$propInfo['nsType']] = "use {$propInfo['ns']};";
                    }
                }
                $props[] = "     */";
                $getters[] = "     */";
                $props[] = "    private \${$propInfo['name']};";
                $props[] = "";
                $getters[] = "    public function get{$propInfo['uCcName']}(): {$propInfo['retType']}";
                $getters[] = "    {";
                $getters[] = "        return \$this->{$propInfo['name']};";
                $getters[] = "    }";
                $getters[] = "";

                $ctorArgs[] = "{$propInfo['retType']} \${$propInfo['lCcName']}";

                $ctorDoc[] = "     * @param \${$propInfo['lCcName']} {$propInfo['phpDocType']}";

                $ctorBody[] = "        \$this->{$propInfo['name']} = \${$propInfo['lCcName']};";

                if ($propInfo['isCore']) {
                    $create[] = "        \$object->{$propInfo['name']} = \$data->{$propInfo['name']}" . ($propInfo['optional'] ? " ?? null" : "") . ";";
                } else {
                    $create[] = "        \$object->{$propInfo['name']} = {$propInfo['nsType']}::createFromObject(\$data->{$propInfo['name']}" . ($propInfo['optional'] ? " ?? null" : "") . ");";
                }
            }
        }

        $use[] = "";
        $create[] = "        return \$object;";
        $create[] = "    }";
        $create[] = "";
        $create[] = "    /**";
        $create[] = "      * Creates array of " . $block->getName() . " objects from data.";
        $create[] = "      * @param array \$data";
        $create[] = "      * @return " . $block->getName() . "[]";
        $create[] = "      */";
        $create[] = "    public static function createFromObjectList(?array \$data): ?array";
        $create[] = "    {";
        $create[] = "        if (is_null(\$data)) {";
        $create[] = "            return null;";
        $create[] = "        };";
        $create[] = "        \$objects = [];";
        $create[] = "        foreach (\$data as \$row) {";
        $create[] = "            \$objects[] = static::createFromObject(\$row);";
        $create[] = "        }";
        $create[] = "        return \$objects;";
        $create[] = "    }";
        $create[] = "";

        $ctorDoc[] = "     */";

        $ctor = array_merge(
            $ctorDoc,
            ["    public function __construct(" . implode(", ", $ctorArgs) . ")", "    {"],
            $ctorBody,
            ["    }", ""]
        );

        $content = array_merge(
            $header,
            $use,
            $class,
            $props,
//            $ctor,
            $getters,
            $methods,
            $create
        );

        $use["Object"] = "use PHPUnit\Framework\TestCase;";
        $testContent = array_merge(
            $header,
            $use,
            $testClass
        );

        $content[] = "}";
        $content[] = "";

        $testContent[] = "}";
        $testContent[] = "";

        return [
            join("\n", $content),
            join("\n", $testContent)
        ];
    }

}