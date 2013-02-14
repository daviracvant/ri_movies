<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * A controller for khmer karaoke.
 * User: RITHY
 * Date: 2/13/13
 * Time: 10:38 PM
 * To change this template use File | Settings | File Templates.
 */
class Karaoke extends MY_Controller
{
    private $my_num_per_page = 20;
    private $my_data;
    public function __construct()
    {
        parent::__construct();
        $this->_public_css_js();
        $this->_add_js("sk_video.js");
        $this->_pack_css_js();
        $this->my_data["menus"] = $this->_set_menu();
        $this->my_data["carabiner"] = $this->carabiner;
        $this->load->library(array("lib_video", "lib_music"));
        if (isset($this->my_user)) {
            $this->my_data['user'] = $this->my_user;
        }
    }

    /**
     * Get khmer karaoke.
     * @param int $page
     */
    public function khmer($page = 0, $filter = null)
    {
        if (is_null($filter))
        {
            $total_khmer_songs = $this->lib_video->load("karaoke")->khmer_songs_count();
        } else {
            $this->my_data["set_studio_id"] = $filter;
            $total_khmer_songs = $this->lib_video->load("karaoke")->khmer_songs_count($filter);
        }
        if (count($total_khmer_songs) > 0)
        {
            $number_of_pages = ceil($total_khmer_songs / $this->my_num_per_page); //page + 1.
            $this->my_data["lower_bound"] = floor($page / 10) * 10;
            $this->my_data["upper_bound"] = (($this->my_data["lower_bound"] + 10) > $number_of_pages) ? $number_of_pages : ($this->my_data["lower_bound"] + 10);
            $karaokes = $this->lib_video->load("karaoke")->get_khmer_songs($page, $filter);
            if (!is_null($karaokes)) {
                $this->my_data["karaokes"] = $karaokes;
            } else {
                $this->my_data["message"] = "No more videos.";
            }
            $this->my_data["page"] = $page;
            $this->my_data["studios"] = $this->lib_music->load("upload")->get_music_studios();
        } else {
            $this->my_data["error"] = "No video in this Khmer Karaoke.";
        }
        $this->_output_html("public", "karaoke", $this->my_data, TRUE);
    }
}