<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/12/13
 * Time: 11:27 PM
 * To change this template use File | Settings | File Templates.
 */
class Lib_Video extends Lib_Loader {
}
class Lib_Video_Default extends Lib_default
{
    /**
     * constructor.
     */
    public function __construct()
    {
        $dependency = array(
            'library' => array('form_validation'),
            'model' => array("video_model", "comment_model"),
            'helper' => array('string'),
        );
        $this->_set_dependencies($dependency);
        $this->_load_dependencies();
    }
} //END VIDEO DEFAULT.

class Lib_Video_List extends Lib_Video_Default
{
    public function get_video_types ()
    {
        $types = $this->video_model->get_video_type();
        if (count($types) == 0)
        {
            return null;
        }
        return $types;
    }

    /**
     * Select one video.
     * @param $filter
     * @param $needle
     * @return null
     */
    public function get_one_recent($filter, $needle)
    {
        $video = $this->video_model->select_one($filter, $needle);
        if (count($video) == 1) {
            return $video;
        }
        return null;
    }

    /**
     * Get videos by users.
     * @param $member_id
     * @param $current_video_id
     * @return null
     */
    public function get_videos_by_user($member_id, $current_video_id)
    {
        $videos = $this->video_model->select_all($member_id, $current_video_id);
        if (count($videos) == 0) {
            return null;
        }
        return $videos;
    }

    /**
     * Get video by categories
     * @param $type_id
     * @param $current_video_id
     * @return null
     */
    public function get_videos_by_categories($type_id, $current_video_id)
    {
        $videos = $this->video_model->select_all($type_id, $current_video_id, "type_id", TRUE);
        if (count($videos) == 0) {
            return null;
        }
        return $videos;
    }

    public function get_videos_comment($video_id)
    {
        $comments = $this->comment_model->select_comments($video_id);
        if (count($comments) == 0)
        {
            return null;
        }
        $comments_response = $this->comment_model->select_response($video_id);
        if (count($comments_response) > 0)
        {
            $comments = $this->_merge_response($comments,$comments_response);
        }
        return $comments;
    }

    /**
     * Merge the response to the comment.
     * @param $comments
     * @param $responses
     */
    private function _merge_response($comments, $responses)
    {
        $index = 0;
        foreach ($comments as $comment)
        {
            foreach ($responses as $response)
            {
                if ($comment->id == $response->comment_id)
                {
                    $comments[$index]->responses[] = $response;
                }
            }
            $index++;
        }
        return $comments;

    }
}
class Lib_Video_Karaoke extends Lib_Video_Default
{
    public function khmer_songs_count($studio_id = null)
    {
        if (is_null($studio_id))
        {
            $where = array("type_id" => 25);
            $count = $this->video_model->get_counts($where);
        } else
        {
            $where = array("type_id" => 25, "studio_id" => $studio_id);
            $count = $this->video_model->get_counts($where);
        }
        return $count;
    }
    public function get_khmer_songs($page = 0, $filter = null)
    {
        if (is_null($filter))
        {
            $songs = $this->video_model->get_songs($page, 25, "type_id");
        } else {
            $songs = $this->video_model->get_songs($page, 25, "type_id",$filter, "studio_id");
        }
        if (count($songs) == 0)
        {
            return null;
        }
        return $songs;
    }
}
class Lib_Video_Upload extends Lib_Video_Default
{
    public function upload($user_id)
    {
        $this->form_validation->set_rules("title", "Title", "required");
        if ($this->form_validation->run() == FALSE) {
            return strip_tags(validaiton_errors());
        }
        $type_id = $this->input->post("video_type");
        $local = $this->input->post("local_video");
        if ($local == "youtube") {
            $link = $this->input->post("youtube_path");
            preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $link, $matches);
            $youtube_id = $matches[0];
            //only store.. no upload.
            $new_video = array(
                "member_id" => $user_id,
                "type_id" => $type_id,
                "title" => $this->input->post("title"),
                "local" => $local,
                "youtube_id" => $youtube_id,
                "studio_id" => $this->input->post("studio"),
                "thumbnail" => "http://img.youtube.com/vi/$youtube_id/0.jpg",
                "path" => $this->input->post("youtube_path"),
                "description" => $this->input->post("video_description"),
                "created_on" => time(),
                "modified_on" => time(),
            );
            if ($this->video_model->insert_video($new_video) == FALSE) {
                return "Unable to insert a new record.";
            } else {
                return TRUE;
            }
        }

        if (is_dir('assets/video/upload/'.$type_id) == FALSE)
        {
            if (mkdir('assets/video/upload/'.$type_id, 0777, true) == FALSE) {
                return "Unable to create directory.";
            }
        }
        $config['upload_path'] = 'assets/video/upload/'.$type_id;
        $config['allowed_types'] = 'flv|avi';
        $config['max_size']	= '10000';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("music_file"))
        {
            return strip_tags($this->upload->display_errors());
        }
        $data = $this->upload->data();
        $new_video = array(
            "member_id" => $user_id,
            "type_id" => $type_id,
            "title" => $this->input->post("title"),
            "local" => $local,
            "path" => $type_id . '/' . $data['file_name'],
            "description" => $this->input->post("video_description"),
            "created_on" => time(),
            "modified_on" => time(),
        );
        if ($this->video_model->insert_video($new_video) == FALSE) {
            return "Unable to insert a new record.";
        }
        return TRUE;
    }

}