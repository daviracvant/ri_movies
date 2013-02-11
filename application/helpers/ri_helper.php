<?php
/**
 * Marker and a dumper.
 * @param string $the_msg
 */

function g($the_variable = "got here!")
{

    if ($the_variable != "got here!") {
        echo "<pre>";
        print_r($the_variable);
        echo "</pre>";
    } else {
        echo $the_variable;
    }

    die();
}

function p($variable)
{
    echo "<pre>";
    print_r($variable);
    echo "</pre>";
}

function v($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
}
