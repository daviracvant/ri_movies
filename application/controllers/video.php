<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/13/13
 * Time: 1:09 AM
 * To change this template use File | Settings | File Templates.
 */

class Video extends MY_Controller
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
            $this->my_data['user'] = $this->my_user;
        }
    }

    /**
     * A controller to play a video.
     * @param $karaoke_id
     */
    public function play($karaoke_id)
    {
        $video = $this->lib_video->load('list')->get_one_recent('sk_movies.id', $karaoke_id);
        if (!is_null($video)) {
            $this->my_data["current_video"] = $video[0];
            $related_videos = $this->lib_video->load("list")->get_videos_by_categories($video[0]->type_id, $video[0]->id);
            if (count($related_videos) > 0)
            {
                $this->my_data["related_videos"] = $related_videos;
            }
            $video_comments = $this->lib_video->load('list')->get_videos_comment($video[0]->id);
            if(!is_null($video_comments))
            {
                $this->my_data["comments"] = $video_comments;
            }
        } else {
            $this->my_data["error"] = "Unable to find requested video.";
        }

        $this->_output_html("public", "play", $this->my_data, TRUE);
    }
}
