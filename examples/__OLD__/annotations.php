<?php

// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';

$class = new tabs\apiclient\PotentialBookingType();

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

$defaultValues = $ref->getDefaultProperties();

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
        " * @method %s set%s(%s %svar) Sets the %s\n",
        $ref->getShortName(),
        ucfirst($prop),
        $type,
        '$',
        $prop
    );
}


echo sprintf(
    " */");

echo "\nclass " . $ref->getShortName() . " extends Builder\n";
echo "{\n";

foreach ($properties as $prop => $type) {
    echo sprintf(
        "\t/**\n\t * @var %s\n\t */\n\tprotected $%s",
        $type,
        $prop
    );

    if (isset($defaultValues[$prop])) {
        echo " = ";

        if (is_scalar($defaultValues[$prop])
            && !is_bool($defaultValues[$prop])
            && $defaultValues[$prop] !== ''
        ) {
            if (is_string($defaultValues[$prop])) {
                echo '\'';
            }
            echo $defaultValues[$prop];
            if (is_string($defaultValues[$prop])) {
                echo '\'';
            }
        }

        if ($defaultValues[$prop] === '') {
            echo '\'\'';
        }
        if (is_bool($defaultValues[$prop])) {
            echo ($defaultValues[$prop] === true) ? 'true' : 'false';
        }
    }
    echo ";\n\n";
}

echo "\t// -------------------- Public Functions -------------------- //\n\n";

$cons = "";

foreach ($properties as $prop => $type) {
    if (substr($type, 0, 10) == 'Collection') {
        $types = explode('|', $type);
        $type = array_pop($types);
        $cons .= sprintf(
            "\t\t\$this->%s = Collection::factory('', new %s, \$this);\n",
            $prop,
            $type
        );
    } else if (substr($type, 0, 16) == 'StaticCollection') {
        $types = explode('|', $type);
        $type = array_pop($types);
        $cons .= sprintf(
            "\t\t\$this->%s = StaticCollection::factory('', new %s, \$this);\n",
            $prop,
            $type
        );
    } else if (substr($type, 0, 1) == '\\') {
        $cons .= sprintf(
            "\t\t\$this->%s = new %s();\n",
            $prop,
            $type
        );
    }
}

if (strlen($cons) > 0) {
echo "\t/**\n\t * @inheritDoc\n\t */\n";
echo "\tpublic function __construct(\$id = null)\n\t{\n";
echo $cons;
echo "\t\tparent::__construct(\$id);\n";
echo "\t}\n\n";
}

echo "\t/**\n\t * @inheritDoc\n\t */\n";
echo "\tpublic function toArray()\n\t{\n";

echo "\t\t\$arr = \$this->__toArray();\n\n";
foreach ($properties as $prop => $type) {
    if (substr($type, 0, 16) == 'StaticCollection'
        || substr($type, 0, 10) == 'Collection'
        || $prop == 'id'
        || $prop == 'parent'
    ) {
        continue;
    }
}
echo "\t\treturn \$arr;\n";

echo "\t}";

foreach ($properties as $prop => $type) {
    echo sprintf(
        "\n\n\t/**\n\t * @return %s\n\t */\n\tpublic function get%s()\n\t{\n\t\t",
        $type,
        ucfirst($prop)
    );
    echo sprintf(
        'return $this->%s;',
        $prop
    );
    echo sprintf(
        "\n\t}"
    );
}

echo "\n}";