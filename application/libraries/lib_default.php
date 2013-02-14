<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * This default class should be extended by all classes.
 *
 */

class Lib_default {

    // list of dependencies
    private $my_dependencies = array();

    /**
     * Load dependencies
     */
    protected function _load_dependencies() {

        foreach($this->my_dependencies as $my_dependent_type => $my_dependent_values)
        {
            if($my_dependent_type == "library")
            {
                $this->load->library($my_dependent_values);
            }
            else if($my_dependent_type == "model")
            {
                $this->load->model($my_dependent_values);
            }
            else if($my_dependent_type == "helper")
            {
                $this->load->helper($my_dependent_values);
            }
            else if($my_dependent_type == "config")
            {
                $this->config->load($my_dependent_values);
            }
            else if($my_dependent_type == "lang")
            {
                $this->lang->load($my_dependent_values);
            }
        }
    }

    /**
     * Set dependencies
     * @param array $the_dependent
     */
    protected function _set_dependencies($the_files)
    {
        foreach($the_files as $the_key => $the_value)
        {
            $this->my_dependencies[$the_key] = $the_value;
        }
    }

    /**
     * Enables the use of global CI object.
     *
     * @param $var
     *
     * @return mixed
     */

    public function __get($var) {
        return get_instance()->$var;
    }

} // end default library

class Default_exception extends Exception {
} // end exception