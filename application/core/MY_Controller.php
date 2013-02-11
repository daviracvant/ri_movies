<?php
/**
 * My controller.
 * @author: RITHY CHHEN
 * Date: 1/17/13
 * Time: 9:27 PM
 * To change this template use File | Settings | File Templates.
 */
class MY_Controller extends CI_Controller
{
    protected $visitor_ip;
    private $local_host = "127.0.0.1";
    protected $my_user;
    /**
     * constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->visitor_ip=getenv('REMOTE_ADDR');
        $this->load->helper(array('form', 'url', 'ri'));
        $this->load->library(array("carabiner", "authentication", "admin"));
        if ($this->_is_developer() == FALSE)
        {
            $this->_pack_css_js();
            $data["carabiner"] = $this->carabiner;
            echo $this->load->view("construction", $data, TRUE);
            die();
        }
    }

    protected function _admin_css_js()
    {
        $this->js_files = array("jquery.min.js","jquery-ui.js","bootstrap.min.js","jasny-bootstrap.min.js",
            "application.js", 'bootbox.min.js','jquery.form.js', "mustache.js", "sk_admin.js");
        $this->css_files = array("jasny-bootstrap.min.css", "bootstrap.min.css",
        "icon/fugue.min.css", "icon/elusive.min.css", "icon/font-awesome.min.css",
        "default.min.css", "default.responsive.min.css","jui/jquery.ui.min.css");
    }
    protected function _is_developer()
    {
        $is_dev = FALSE;
        if ($this->visitor_ip == $this->local_host)
        {
            $is_dev = TRUE;
        }
        return $is_dev;
        //check the ip.
    }
    /**
     * Redirect admin login.
     * @return bool
     */
    protected function _redirect_admin_login()
    {
        $is_logged_in = $this->authentication->is_logged_in();
        if ($is_logged_in == FALSE)
        {
            redirect(base_url("admin/home/login"));
        }
        $user_id = $this->session->userdata('admin_login');
        $this->my_user = $this->admin->get_current_staff($user_id);

        return TRUE;
    }

    protected function _redirect_member_login()
    {

    }
    /**
     * Output to html.
     * @param $filter
     * @param $body
     * @param $data
     * @param bool $include
     */
    protected function _output_html($filter, $body, $data,  $include = TRUE)
    {
        $this->load->view($filter. "/header", $data);
        if ($include == TRUE) {
            $this->load->view($filter."/topbar", $data);
            $this->load->view($filter."/sidebar", $data);
//            $this->load->view($filter."/body", $data);
        }
        $this->load->view($body, $data);
        $this->load->view("include/footer", $data);
    }
    /**
     * Add js file to the list.
     * @param $files
     */
    protected function _add_js ($files)
    {
        if (is_array($files)) {
            foreach ($files as $file) {
                $this->js_files[] = $file;
            }
        } else {
            $this->js_files[] = $files;
        }
    }

    /**
     * add css files to the list.
     * @param $files
     */
    protected function _add_css($files)
    {
        if (is_array($files)) {
            foreach ($files as $file) {
                $this->css_files[] = $file;
            }
        } else {
            $this->css_files[] = $files;
        }
    }
    /*
     * pack the css and js.
     */
    protected function _pack_css_js()
    {
        foreach ($this->js_files as $file) {
            $this->carabiner->js($file);
        }
        foreach ($this->css_files as $file) {
            $this->carabiner->css($file);
        }
    }
}