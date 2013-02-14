<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * A controller for khmer karaoke.
 * User: RITHY
 * Date: 2/13/13
 * Time: 10:38 PM
 * To change this template use File | Settings | File Templates.
 */
class Drama extends MY_Controller
{
    private $my_data;
    public function __construct()
    {
        parent::__construct();
        $this->_public_css_js();
        $this->_add_js("sk_video.js");
        $this->_pack_css_js();
        $this->my_data["menus"] = $this->_set_menu();
        $this->my_data["carabiner"] = $this->carabiner;
        $this->load->library("lib_video");
        if (isset($this->my_user)) {
            $this->my_data = $this->my_user;
        }
    }

    public function khmer($page = 0)
    {

    }

    public function thai($page = 0)
    {

    }

    public function korean($page = 0)
    {

    }

    public function japanese($page = 0)
    {

    }

    public function chinese ($page = 0)
    {

    }
}