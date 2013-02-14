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
        $this->_add_js("ad_music.js");
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
            $response = $this->lib_music->load("upload")->upload_music($this->my_user->id);
            if (is_string($response)) {
                echo json_encode(array("status"=> 0, "message"=>$response));
                exit;
            } else {
                echo json_encode(array("status"=> 1, "message"=> "Upload completed."));
                exit;
            }
        }
        $this->my_data["singers"] = $this->lib_music->load("upload")->get_singers();
        $this->my_data["type"] = $this->lib_music->load("upload")->get_music_type();
        $this->my_data["studios"] = $this->lib_music->load("upload")->get_music_studios();
        $this->my_data["user"] = $this->my_user;
        $this->_output_html("admin", "admin/upload_music", $this->my_data, TRUE);
    }

    public function view_all()
    {
        try {
            $this->my_data["songs"] = $this->lib_music->load("list")->get_all_songs();
        } catch(Lib_Music_Exception $e) {
            $this->my_data["message"] = $e->getMessage();
        }
        $this->my_data["user"] = $this->my_user;
        $this->_output_html("admin", "admin/view_all", $this->my_data, TRUE);
    }
    public function play()
    {
        if ($this->input->post())
        {
            $player = base_url("assets/music/player_mp3_maxi.swf");
            $file = base_url('assets/music/upload/' . $this->input->post("path"). $this->input->post("extension"));
            $file_name = explode("/", $this->input->post("path"));
            echo $this->load->view("admin/partials/play", array('file' => $file,"player"=> $player, "name" => str_replace("_", " ", $file_name[1])));
        }
    }
}