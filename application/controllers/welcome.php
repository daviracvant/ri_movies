<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 1/24/13
 * Time: 12:38 AM
 * To change this template use File | Settings | File Templates.
 */

class Welcome extends MY_Controller
{
    private $my_data;
    public function __construct()
    {
        parent::__construct();
        $this->_public_css_js();
        $this->_pack_css_js();
        $this->my_data["menus"] = $this->_set_menu();
        $this->my_data["carabiner"] = $this->carabiner;
        $this->load->library("lib_video");
    }
    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $karaoke = $this->lib_video->load("list")->get_one_recent("type_id", 25);
        $this->my_data['karaoke']= $karaoke[0];
//        print_r($karaoke);
//        die();
        $this->_output_html('public', 'welcome_message',$this->my_data);
    }
}