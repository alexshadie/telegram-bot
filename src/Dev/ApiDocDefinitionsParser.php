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
                [$fileContents, $testFileContents, $stubFileContents] = $this->getFile($block, ($this->files[$block->getName()] ?? null));
//                echo $fileContents . "\n\n";
                var_dump($this->fullFiles[$block->getName()] ?? realpath(__DIR__ . "/../Misc/") . "/{$block->getName()}.php");
                file_put_contents(
                    $this->fullFiles[$block->getName()] ?? realpath(__DIR__ . "/../Misc/") . "/{$block->getName()}.php",
                    $fileContents
                );

                $stubFilename = str_replace("/src/", "/stubs/", $this->fullFiles[$block->getName()] ?? realpath(__DIR__ . "/../Misc/") . "/{$block->getName()}.php");
                $stubFilename = str_replace(".php", "Stub.php", $stubFilename);
                $stubDirName = preg_replace('!/[a-z0-9]+\.php$!i', '/', $stubFilename);
                if (!is_dir($stubDirName)) {
                    mkdir($stubDirName, 0755, true);
                }

                file_put_contents(
                    $stubFilename,
                    $stubFileContents
                );

                if ($testFileContents) {
                    $testFilename = str_replace("/src/", "/tests/", $this->fullFiles[$block->getName()] ?? realpath(__DIR__ . "/../Misc/") . "/{$block->getName()}.php");
                    $testFilename = str_replace(".php", "Test.php", $testFilename);
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
    }

    public function splitLineByChunks($line, $maxlen = 120)
    {
        $result = [];
        $lines = explode("\n", $line);

        foreach ($lines as $line) {
            while (strlen($line) > $maxlen) {
                for ($i = $maxlen; $line[$i] != " " && $i > 0; $i--) ;

                if ($i > 0) {
                    $result[] = substr($line, 0, $i);
                    $line = substr($line, $i + 1);
                }
            }
            $result[] = $line;
        }
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

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function randomValue($prop) {
        if (!$prop['isCore']) {
            if ($prop['isArray']) {
                $parts = [];
                for ($i = rand(1,3); $i > 0; $i--) {
                    $rnd = rand(1,3);
                    $parts[] = "{$prop['nsType']}Stub::get{$prop['nsType']}WithCommonFields{$rnd}()";
                }
                return "[" . join(', ', $parts) . "]";
            } else {
                $rnd = rand(1, 3);
                return "{$prop['nsType']}Stub::get{$prop['nsType']}WithCommonFields{$rnd}()";
            }
        }
        switch ($prop['nsType']) {
            case "int":
                return rand();
            case "string":
                return "'" . $this->generateRandomString() . "'";
            case "bool":
                return rand(0,1) ? 'true' : 'false';
            case "float":
                return rand() / 100.0;
            case "string[]":
                $parts = [];
                for ($i = rand(1,3); $i > 0; $i--) {
                    $parts[] = "'" . $this->generateRandomString() . "'";
                }
                return "[" . join(", ", $parts) . "]";
            default:
                die($prop['nsType']);
        }
    }

    private function generateStubMethods($classInfo) {
        $methods = [];
        // 1. Generic values
        for ($i = 1; $i <= 3; $i++) {
            $methods[] = "    /**";
            $methods[] = "     * @return {$classInfo['name']}";
            $methods[] = "     */";

            $methods[] = "    public static function get{$classInfo['name']}WithCommonFields{$i}(): {$classInfo['name']}";
            $methods[] = "    {";

            $methods[] = "        return new {$classInfo['name']}(";

            $ctorArgs = [];

            foreach ($classInfo['props'] as $prop) {
                if (!$prop['optional']) {
                    $ctorArgs[] = "            {$this->randomValue($prop)}";
                }
            }

            $methods[] = join(",\n", $ctorArgs);

            $methods[] = "        );";

            $methods[] = "    }";
        }

        // 2. Extended
        for ($i = 1; $i <= 3; $i++) {
            $methods[] = "    /**";
            $methods[] = "     * @return {$classInfo['name']}";
            $methods[] = "     */";

            $methods[] = "    public static function get{$classInfo['name']}WithAllFields{$i}(): {$classInfo['name']}";
            $methods[] = "    {";

            $methods[] = "        return new {$classInfo['name']}(";

            $ctorArgs = ['req' => [], 'opt' => []];

            foreach ($classInfo['props'] as $prop) {
                $ctorArgs[$prop['optional'] ? 'opt' : 'req'][] = "            {$this->randomValue($prop)}";
            }

            $methods[] = join(",\n", array_merge($ctorArgs['req'], $ctorArgs['opt']));

            $methods[] = "        );";

            $methods[] = "    }";
        }
        return $methods;
    }

    private function generateTestMethods($classInfo) {
        if (!count($classInfo['props'])) {
            return [];
        }
        $methods = [];
        // 1. Generic values
        $methods[] = "    public function testConstruct{$classInfo['name']}WithCommonFields()";
        $methods[] = "    {";

        $methods[] = "        \$obj = new {$classInfo['name']}(";

        $ctorArgs = [];
        $testLines = [];

        foreach ($classInfo['props'] as $prop) {
            if (!$prop['optional']) {
                $rndVal = $this->randomValue($prop);
                $ctorArgs[] = "            {$rndVal}";
                $testLines[] = "        \$this->assertEquals({$rndVal}, \$obj->get{$prop['uCcName']}());";
            } else {
                $testLines[] = "        \$this->assertNull(\$obj->get{$prop['uCcName']}());";
            }
        }

        $methods[] = join(",\n", $ctorArgs);

        $methods[] = "        );";

        $methods[] = join("\n", $testLines);

        $methods[] = "    }";
        $methods[] = "";

        // 2. Extended
        $methods[] = "    public function testConstruct{$classInfo['name']}WithAllFields()";
        $methods[] = "    {";

        $methods[] = "        \$obj = new {$classInfo['name']}(";

        $ctorArgs = ['req' => [], 'opt' => []];
        $testLines = [];

        foreach ($classInfo['props'] as $prop) {
            $rndVal = $this->randomValue($prop);
            $ctorArgs[$prop['optional'] ? 'opt' : 'req'][] = "            {$rndVal}";
            $testLines[] = "        \$this->assertEquals({$rndVal}, \$obj->get{$prop['uCcName']}());";
        }

        $methods[] = join(",\n", array_merge($ctorArgs['req'], $ctorArgs['opt']));

        $methods[] = "        );";

        $methods[] = join("\n", $testLines);

        $methods[] = "    }";

        return $methods;
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

        $use = [];
        $stubUse = [];
        $class = [];
        $props = [];
        $ctorDoc = [];
        $ctorArgs = ['req' => [], 'opt' => []];
        $ctorBody = [];
        $getters = [];
        $methods = [];
        $create = [];
        $createSet = [];
        $createCtor = [];

        $stubClass = [];

        $testClass = [];


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

        $testClass[] = "class {$block->getName()}Test extends TestCase";
        $testClass[] = "{";

        $stubClass[] = "/**";
        $stubClass[] = " * Stub for {$block->getName()} class. Use it for testing.";
        $stubClass[] = " */";
        $stubClass[] = "class {$block->getName()}Stub extends {$block->getName()}";
        $stubClass[] = "{";

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
        $create[] = "        \$object = new " . $block->getName() . "(";

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
                    'isArray' => $this->getRetType($property['type']) === 'array',
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
                        $stubUse[$propInfo['nsType']] = preg_replace('!([a-z0-9]+);$!i', '\\1Stub;', "use {$propInfo['ns']};");
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

                $ctorArgs[$propInfo['optional'] ? "opt" : "req"][] = "{$propInfo['retType']} \${$propInfo['lCcName']}" . ($propInfo['optional'] ? " = null" : "");

                $ctorDoc[] = "     * @param {$propInfo['phpDocType']} \${$propInfo['lCcName']}";

                $ctorBody[] = "        \$this->{$propInfo['name']} = \${$propInfo['lCcName']};";

                if ($propInfo['optional']) {
                    if ($propInfo['isCore']) {
                        $createSet[] = "        \$object->{$propInfo['name']} = \$data->{$propInfo['name']}" . ($propInfo['optional'] ? " ?? null" : "") . ";";
                    } else {
                        $createSet[] = "        \$object->{$propInfo['name']} = {$propInfo['nsType']}::createFromObject(\$data->{$propInfo['name']}" . ($propInfo['optional'] ? " ?? null" : "") . ");";
                    }
                } else {
                    if ($propInfo['isCore']) {
                        $createCtor[] = "\$data->{$propInfo['name']}" . ($propInfo['optional'] ? " ?? null" : "");
                    } else {
                        if ($propInfo['isArray']) {
                            $createCtor[] = "{$propInfo['nsType']}::createFromObjectList(\$data->{$propInfo['name']}" . ($propInfo['optional'] ? " ?? null" : "") . ")";
                        } else {
                            $createCtor[] = "{$propInfo['nsType']}::createFromObject(\$data->{$propInfo['name']}" . ($propInfo['optional'] ? " ?? null" : "") . ")";
                        }
                    }
                }
            }
        }

        $stubMethods = $this->generateStubMethods($classInfo);

        $testMethods = $this->generateTestMethods($classInfo);

        $create[] = "            " . implode(",\n            ", $createCtor);
        $create[] = "        );";
        $create[] = "";
        $create = array_merge($create, $createSet);
        $create[] = "";
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
            ["    public function __construct(" . implode(", ", array_merge($ctorArgs['req'], $ctorArgs['opt'])) . ")", "    {"],
            $ctorBody,
            ["    }", ""]
        );

        $content = array_merge(
            $header,
            $use,
            $use ? [""] : [],
            $class,
            $props,
            $ctor,
            $getters,
            $methods,
            $create
        );

        $stubContent = array_merge(
            $header,
            $stubUse,
            [""],
            $stubClass,
            $stubMethods
        );

        if ($testMethods) {
            $testContent = array_merge(
                $header,
                ["use PHPUnit\Framework\TestCase;"],
//                array_values($use),
                $stubUse,
                $stubUse ? [""] : [],
                $testClass,
                $testMethods
            );
            $testContent[] = "}";
            $testContent[] = "";
        } else {
            $testContent = [];
        }

        $content[] = "}";
        $content[] = "";

        $stubContent[] = "}";
        $stubContent[] = "";

        return [
            join("\n", $content),
            join("\n", $testContent),
            join("\n", $stubContent)
        ];
    }

    public function buildApi() {
        $methods = [];
        $dd = 0;
        $methodsText = [];
        foreach ($this->blocks as $block) {
            if ($block->getType() == 'method') {

                $docBlockArgs = [];
                $methodBody = [];
                $methods = [];

                $methodInfo = [
                    'name' => $block->getName(),
                    'retIsArray' => $block->getReturnIsArray(),
                    'retType' => $block->getReturnType(),
                ];

//                var_dump($block);

                $docBlockArgs[] = "    /**";
                foreach ($this->splitLineByChunks($block->getDescription(), 117) as $line) {
                    $docBlockArgs[] = "     * " . $line;
                }
                $docBlockArgs[] = "     *";

                $methodBody = [];
                $methodArgs = [];
                $paramsArray = [];
                $paramsArray[] = "        \$params = [";

                foreach ($block->getArgs() ?? [] as $arg) {
                    $paramDocs = [];

                    $paramDoc = "@param " . $this->getDocType($arg['type']) . " \$" . $this->underscoreToCamelCase($arg['name'], true) . " ";

                    foreach ($this->splitLineByChunks($arg['description'], 113) as $line) {
                        $paramDocs[] = "    " . $line;
                    }
                    $paramDocs[0] = $paramDoc . " " . $paramDocs[0];
                    for ($i = 0; $i < count($paramDocs); $i++) {
                        $paramDocs[$i] = "     * " . $paramDocs[$i];
                    }


                    $docBlockArgs = array_merge($docBlockArgs, $paramDocs);

                    $methodArgs[] = ($arg['optional'] ? '?' : '') . $this->getRetType($arg['type']) . " \$" . $this->underscoreToCamelCase($arg['name'], true) .
                        ($arg['optional'] ? " = null" : "");

                    $paramsArray[] = "            '{$arg['name']}' => \$" . $this->underscoreToCamelCase($arg['name'], true) . ",";
                }

                $paramsArray[] = "        ];";

                $docBlockArgs[] = "     * @return {$block->getReturnType()}" . ($block->getReturnIsArray() ? "[]" : "");
                $docBlockArgs[] = "     */";


                $methods[] = "    public function " . $this->underscoreToCamelCase($block->getName(), 1) . "(" . join(', ', $methodArgs) . "): " .
                    ($block->getReturnIsArray() ? "array" : $block->getReturnType());
                $methods[] = "    {";

                $methodBody[] = "        \$data = \$this->query('{$block->getName()}', \$params);";

                if ($this->getCoreType($block->getReturnType())) {
                    $methodBody[] = "return \$data->result;";
                } else {
                    if ($block->getReturnIsArray()) {
                        $methodBody[] = "        return {$block->getReturnType()}::createFromObjectList(\$data->result);";
                    } else {
                        $methodBody[] = "        return {$block->getReturnType()}::createFromObject(\$data->result);";
                    }
                }

                $methods = array_merge($methods, $paramsArray);
                $methods = array_merge($methods, $methodBody);

                $methods[] = "    }";
                $methods[] = "";


                $methodsText = array_merge(
                    $methodsText,
                    $docBlockArgs,
                    $methods
                );
            }

            $content = [];

            $content[] = "class BotApi implements BotApiInterface";
            $content[] = "{";

            $content = array_merge($content, $methodsText);
            $content[] = "}";


            $apiText = join("\n", $content);

            file_put_contents(__DIR__ . "/../Bot/BotApi.php", $apiText);
        }


    }
}