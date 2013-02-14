<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * This default class provide abstraction to load subclasses.
 */

class Lib_Loader {

    private $my_class_prefix;

    // object instances
    private static $my_registry = array();

    // Constructor
    public function __construct() {
        $this->_set_prefix();
    }

    /**
     * Load singleton sub objects.
     * @param $the_object_name
     * @param $the_object_params
     * @return mixed
     */

    public function load($the_object_name, $the_object_params = NULL) {

        $the_object_name = $this->my_class_prefix . "_" . $the_object_name;

        try {

            if (array_key_exists($the_object_name, self::$my_registry)) {
                return self::$my_registry[$the_object_name];
            }
            else {
                self::$my_registry[$the_object_name] = new $the_object_name($the_object_params);
                return self::$my_registry[$the_object_name];
            }

        } catch (Exception $e) {
            throw new Load_exception("Could not load object : " . $the_object_name);
        }
    }

    public function __get($var) {
        return get_instance()->$var;
    }
    /**
     * Set class name.
     */

    private function _set_prefix() {
        $this->my_class_prefix = get_class($this);
    }

} // end default library

class Load_exception extends Exception {
} // end exception