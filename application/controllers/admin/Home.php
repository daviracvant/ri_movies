<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_admin_css_js();
        $this->_pack_css_js();
        $this->load->library('authentication');
    }
    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->_redirect_admin_login();
        $carabiner = $this->carabiner;
        $this->_output_html('admin', 'admin/home',array("user" => $this->my_user, "carabiner" => $carabiner));
    }
    /**
     * Index Page for this controller.
     */
    public function login()
    {
        if ($this->input->post())
        {
            $response = $this->authentication->login();
            if (is_string($response)) {
                echo json_encode(array("status" => 0, "message" => $response));
                exit;
            } else {
                echo json_encode(array("status" => 1));
                exit;
            }
        }
        $carabiner = $this->carabiner;
        $this->_output_html('admin', 'admin/login',array("carabiner" => $carabiner), false);
    }

    /**
     * log out.
     */
    public function logout ()
    {
        $this->authentication->logout();
        redirect(base_url('admin/home/login'));
    }

    public function reset_password()
    {
        if ($this->input->post())
        {
            $response = $this->authentication->generate_password();
            if (is_string($response)) {
                echo json_encode(array("status"=>0, "message"=> $response));
            } else {
                echo json_encode(array("status"=>1, "message"=>"A new password has been sent to you account!."));
            }
        }
    }
}
