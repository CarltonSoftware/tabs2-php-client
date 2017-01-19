<?php

// Include the connection
require_once __DIR__ . '/../creating-a-new-connection.php';

$class = new tabs\apiclient\keysbookingbrand\UserType();

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
        "\t/**\n\t * %s\n\t *\n\t * @var %s\n\t */\n\tprotected $%s",
        ucfirst($prop),
        $type,
        $prop
    );
    
    if (isset($defaultValues[$prop])) {
        echo " = " . $defaultValues[$prop];
        if ($defaultValues[$prop] === '') {
            echo '\'\'';
        }
        if (is_bool($defaultValues[$prop])) {
            echo $defaultValues[$prop] === true ? 'true' : 'false';
        }
    }
    echo ";\n\n";
}

echo "\t// -------------------- Public Functions -------------------- //\n\n";

$cons = "";

foreach ($properties as $prop => $type) {
    if (in_array($type, array('\DateTime'))) {
        $cons .= sprintf(
            "\t\t\$this->%s = new \DateTime();\n",
            $prop
        );
    }
    
    if (substr($type, 0, 10) == 'Collection') {
        $types = explode('|', $type);
        $type = array_pop($types);
        $cons .= sprintf(
            "\t\t\$this->%s = Collection::factory('', new %s, \$this);\n",
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

foreach ($properties as $prop => $type) {
    
    if (!in_array($type, array('string', 'integer', 'float', 'boolean', '\DateTime')) 
        && substr($type, 0, 10) !== 'Collection'
        && substr($type, 0, 16) !== 'StaticCollection'
        && !in_array($prop, array('id', 'parent'))
    ) {
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
    if (substr($type, 0, 16) == 'StaticCollection'
        || substr($type, 0, 10) == 'Collection'
        || $prop == 'id'
        || $prop == 'parent'
    ) {
        continue;
    }
    
    if ($type == 'boolean') {
        echo sprintf(
            "\t\t\t'%s' => \$this->boolToStr(\$this->%s)",
            $prop,
            'get' . ucfirst($prop) . '()'
        );
    } else {
    
        if (stristr($type, 'apiclient')) {
            echo sprintf(
                "\t\t\t'%sid' => \$this->%s",
                $prop,
                'get' . ucfirst($prop) . '()'
            );
        } else {
            echo sprintf(
                "\t\t\t'%s' => \$this->%s",
                $prop,
                'get' . ucfirst($prop) . '()'
            );
        }
    }
    
    if (stristr($type, 'apiclient')) {
        echo '->getId()';
    }
    
    if (stristr($type, '\DateTime')) {
        echo "->format('Y-m-d')";
    }
    
    echo ",\n";
}
echo "\t\t);\n";

echo "\t}";

echo "\n}";