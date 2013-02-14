<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/5/13
 * Time: 12:52 AM
 * To change this template use File | Settings | File Templates.
 */
class Video extends MY_Controller {


    public function __construct() {
        parent::__construct();
        $this->_admin_css_js();
        $this->_add_js("ad_music.js");
        $this->_pack_css_js();
        $this->_redirect_admin_login();
        $this->load->library(array("lib_video", 'lib_music'));
        $this->my_data['carabiner'] = $this->carabiner;
    }

    public function upload()
    {
        if ($this->input->post()) {
            //do the upload.
            $response = $this->lib_video->load('upload')->upload($this->my_user->id);
            if(is_string($response))
            {
                echo json_encode(array("status"=> 0, "message" => $response));
            } else {
                echo json_encode(array("status" => 1, "message" => "Video has been uploaded."));
            }
            exit;
        }
        $this->my_data["types"] = $this->lib_video->load("list")->get_video_types();
        $this->my_data["user"] = $this->my_user;
        $this->my_data["studios"] = $this->lib_music->load("upload")->get_music_studios();
        $this->_output_html("admin", "admin/upload_video", $this->my_data, TRUE);
    }
}