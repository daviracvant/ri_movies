<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 1/24/13
 * Time: 12:38 AM
 * To change this template use File | Settings | File Templates.
 */

class Welcome extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_add_css(array("ri_movies.css"));
        $this->_pack_css_js();
    }
    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $carabiner = $this->carabiner;
        $this->_output_html('public', 'welcome_message',array("carabiner" => $carabiner));
    }
}