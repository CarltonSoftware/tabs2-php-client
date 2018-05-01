<?php

require_once __DIR__ . '/../creating-a-new-connection.php';

$q = filter_input(INPUT_GET, 'q');

if ($q) {
    $classes = explode(':', $q);
    
    $c = explode('-', array_shift($classes));
    $id = $c[1];
    $class = str_replace('_', '\\', $c[0]);
    
    $obj = new $class($id);
    $obj->get();
    
    echo '<h4>' . $obj->getClass() . '</h4>';
    
    $ref = new ReflectionClass($obj);
    $properties = array();

    foreach ($ref->getProperties() as $property) {
        $refProp = new ReflectionProperty($class, $property->getName());

        preg_match_all('#@(.*?)\n#s', $refProp->getDocComment(), $annotations);

        if (isset($annotations[1]) && isset($annotations[1][0])) {
            $type = substr($annotations[1][0], 4);
            $properties[$property->getName()] = $type;
        }
    }

    $values = array();
    foreach ($properties as $prop => $type) {
        $getter = 'get' . ucfirst($prop);
        if (in_array($type, array('string', 'integer', 'float'))) {
            $values[$prop] = $obj->$getter();
        } else if ($type == '\DateTime') {
            $values[$prop] = $obj->$getter()->format('Y-m-d H:i:s');
        }
    }
    echo create_list($values);
}

function create_list($array)
{
    $list = '';
    if (count($array) > 0) {
        $list = '<ul>';
        foreach ($array as $key => $value) {
            $value = stristr($value, '<title>') ? htmlentities($value) : $value;
            $list .= '<li>' . $key . ': ' . $value . '</li>';
        }
        $list .= '</ul>';
    }
    
    return $list;
}

require_once __DIR__ . '/../finally.php';