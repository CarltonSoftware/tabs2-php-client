<?php

// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';

$class = new tabs\apiclient\actor\ActorDocument();
$ref = new ReflectionClass($class);
$properties = array();

echo "\nuse tabs\apiclient\Builder;\n\n";
echo sprintf(
    "/**
 * Tabs Rest API %s object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright %s Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
",
    $ref->getShortName(),
    date('Y')
);

foreach ($ref->getProperties() as $property) {
    $refProp = new ReflectionProperty($class, $property->getName());
    
    preg_match_all('#@(.*?)\n#s', $refProp->getDocComment(), $annotations);
    
    if (isset($annotations[1]) && isset($annotations[1][0])) {
        $type = substr($annotations[1][0], 4);
        $properties[$property->getName()] = $type;
    }
}

foreach ($properties as $prop => $type) {
    echo sprintf(
        " * @method %s get%s() Returns the %s\n",
        $type,
        ucfirst($prop),
        $prop
    );
    if (in_array($type, array('string', 'integer', 'float', 'boolean', '\DateTime'))) {
        echo sprintf(
            " * @method %s set%s(%s %svar) Sets the %s\n * \n",
            $ref->getShortName(),
            ucfirst($prop),
            $type,
            '$',
            $prop
        );
    }
}


echo sprintf(
    " */");

echo "\nclass " . $ref->getShortName() . " extends Builder\n";
echo "{\n";

foreach ($properties as $prop => $type) {
    echo sprintf(
        "\t/**\n\t * %s\n\t *\n\t * @var %s\n\t */\n\tprotected $%s;\n\n",
        ucfirst($prop),
        $type,
        $prop
    );
}

echo "\t// -------------------- Public Functions -------------------- //\n\n";

echo "\t/**\n\t * Constructor\n\t *\n\t * @return void\n\t */\n";
echo "\tpublic function __construct()\n\t{\n";

foreach ($properties as $prop => $type) {
    if (in_array($type, array('\DateTime'))) {
        echo sprintf(
            "\t\t\$this->%s = \$this->%s;\n",
            $prop,
            'get' . ucfirst($prop) . '()'
        );
    }
}

echo "\t}\n\n";

foreach ($properties as $prop => $type) {
    if (!in_array($type, array('string', 'integer', 'float', 'boolean', '\DateTime'))) {
        echo sprintf(
            "\t/**\n\t * Set the %s\n\t *\n\t * @param stdclass|array|%s $%s The %s\n\t *\n\t * @return %s\n\t */\n",
            $prop,
            $type,
            $prop,
            ucfirst($prop),
            $ref->getShortName()
        );
        echo sprintf(
            "\tpublic function %s($%s)\n\t{\n",
            'set' . ucfirst($prop),
            $prop
        );
        echo sprintf(
            "\t\t\$this->%s = %s::factory($%s);\n\n",
            $prop,
            $type,
            $prop
        );
        echo sprintf(
            "\t\treturn \$this;\n\t}\n\n",
            $prop,
            $prop
        );
    }
}

echo "\t/**\n\t * @inheritDoc\n\t */\n";
echo "\tpublic function toArray()\n\t{\n";

echo "\t\treturn array(\n";
foreach ($properties as $prop => $type) {
    echo sprintf(
        "\t\t\t'%s' => \$this->%s,\n",
        $prop,
        'get' . ucfirst($prop) . '()'
    );
}
echo "\t\t);\n";

echo "\t}";

echo "\n}";