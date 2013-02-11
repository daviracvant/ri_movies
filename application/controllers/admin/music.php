<?php
/**
 * Created by JetBrains PhpStorm.
 * @author: RITHY CHHEN
 * Date: 2/6/13
 * Time: 10:27 PM
 * To change this template use File | Settings | File Templates.
 */
class Music extends MY_Controller
{
    private $my_data;
    public function __construct()
    {
        parent::__construct();
        $this->_admin_css_js();
        $this->_pack_css_js();
        $this->_redirect_admin_login();
        $this->load->library("lib_music");
        $this->my_data['carabiner'] = $this->carabiner;
    }

    /**
     * function to upload music file.
     */
    public function upload()
    {
        if ($this->input->post()) {
            $response = $this->lib_music->upload_music($this->my_user->id);
            if (is_string($response)) {
                echo json_encode(array("status"=> 0, "message"=>$response));
                exit;
            } else {
                echo json_encode(array("status"=> 1, "message"=> "Upload completed."));
                exit;
            }
        }
        $this->my_data["singers"] = $this->lib_music->get_singers();
        $this->my_data["type"] = $this->lib_music->get_music_type();
        $this->my_data["studios"] = $this->lib_music->get_music_studios();
        $this->my_data["user"] = $this->my_user;
        $this->_output_html("admin", "admin/upload_music", $this->my_data, TRUE);
    }
}