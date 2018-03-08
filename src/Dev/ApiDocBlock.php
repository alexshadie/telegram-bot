<?php


namespace alexshadie\TelegramBot\Dev;


class ApiDocBlock
{
    private $html;
    private $type;
    private $name;
    private $args;
    private $description;
    private $returnType;
    private $returnIsArray;

    public function __construct($html)
    {
        $this->html = $html;
        $matches = [];

        $block = \phpQuery::newDocument($html);
        $header = $block->find('h4');
        $block->find('h4')->remove();

        $table = $block->find('table');
        $block->find('table')->remove();

        preg_match("!^.*([^>]+)$!Uism", $header->html(), $matches);

        $this->name = $matches[1];

        if (strpos($this->name, " ") !== false) {
            $this->type = 'unknown';
            return;
        } elseif (ucfirst($this->name) === $this->name) {
            $this->type = 'object';
        } else {
            $this->type = 'method';
        }

        $this->description = trim(strip_tags(str_replace(["<br>", "<br/>"], "\n", $block->html())));

        if ($this->type === 'object') {
            $trs = $table->find("tr");
            for ($i = 1; $i < $trs->count(); $i++) {
                $tds = pq($trs->get($i))->find('td');
                $desc = trim(pq($tds->get(2))->html());
                $this->args[] = [
                    'name' => trim(pq($tds->get(0))->html()),
                    'type' => strip_tags(trim(pq($tds->get(1))->html())),
                    'description' => trim(str_replace('Optional.', '', strip_tags($desc))),
                    'optional' => strpos($desc, 'Optional') !== false,
                ];
            }
        } elseif ($this->type === 'method') {
            $trs = $table->find("tr");
            for ($i = 1; $i < $trs->count(); $i++) {
                $tds = pq($trs->get($i))->find('td');
                $desc = trim(pq($tds->get(3))->html());
                $this->args[] = [
                    'name' => trim(pq($tds->get(0))->html()),
                    'type' => strip_tags(trim(pq($tds->get(1))->html())),
                    'description' => trim(strip_tags(str_replace('<em>Optional</em>.', '', $desc))),
                    'optional' => trim(pq($tds->get(2))->html()) === 'Optional',
                ];
            }
        }
    }

    public function recognizeReturnType($types) {
        preg_match_all('!\.([^\.]*return[^\.]*)\.!Uism', str_replace('.', '..', $this->getDescription()), $m);
        $returnCentence = join(' ', $m[1]);
        foreach ($types as $type) {
            if (preg_match("!\b{$type}\b!", $returnCentence)) {
                $this->returnType = $type;
            } elseif (preg_match("!\b{$type}s\b!", $returnCentence)) {
                $this->returnType = $type;
                $this->returnIsArray = true;
            }
        }

        if (!$this->returnType) {
            if (preg_match("!\b(true|True)\b!", $returnCentence)) {
                $this->returnType = "bool";
            } elseif (preg_match("!\bInt\b!", $returnCentence)) {
                $this->returnType = "int";
            } elseif (preg_match("!\bString\b!", $returnCentence)) {
                $this->returnType = "string";
            }
        }

        if (is_null($this->returnIsArray)) {
            if (strpos(strtolower($returnCentence), 'array') !== false) {
                $this->returnIsArray = true;
            } else {
                $this->returnIsArray = false;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getReturnType()
    {
        return $this->returnType;
    }

    /**
     * @return mixed
     */
    public function getReturnIsArray()
    {
        return $this->returnIsArray;
    }


}