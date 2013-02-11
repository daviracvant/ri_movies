<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/8/13
 * Time: 12:04 AM
 * To change this template use File | Settings | File Templates.
 */
class Lib_music
{
    public function __construct() {
        $this->load->model("music_model");
    }

    public function upload_music($user_id)
    {
        $this->form_validation->set_rules("title", "Title", "required");
        if ($this->form_validation->run() == FALSE) {
            return strip_tags(validaiton_errors());
        }
        $type_cat = explode(":", $this->input->post("music_type"));
        $type_id = $type_cat[0];
        if (!is_dir(APPPATH .'cache/'.$type_id))
        {
            if (mkdir(APPPATH .'cache/'.$type_id, 0777, true) == FALSE) {
                return "Unable to create directory.";
            }
        }
        $config['upload_path'] = APPPATH .'cache/'.$type_id;
        $config['allowed_types'] = 'mp3|wav|wma';
        $config['max_size']	= '10000';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("music_file"))
        {
            return strip_tags($this->upload->display_errors());
        }
        $data = $this->upload->data();
        $new_music = array(
            "member_id" => $user_id,
            "singer_id" => 1,
            "studio_id" => $this->input->post("music_studio"),
            "type_id" => $type_id,
            "title" => $this->input->post("title"),
            "release_date" => $this->input->post("release_date"),
            "path" => $type_id . '/' . $data['file_name'],
            "created_on" => time(),
            "modified_on" => time(),
        );
        if ($this->music_model->insert_music($new_music) == FALSE) {
            return "Unable to insert a new record.";
        }
        return TRUE;

    }
    public function get_singers()
    {
        $singers = $this->music_model->select_singers();
        if (count($singers) == 0) {
            return null;
        }
        return $singers;
    }
    /**
     * Get the music type.
     * @return null
     */
    public function get_music_type()
    {
        $types = $this->music_model->get_music_type();
        if (count($types) == 0) {
            return null;
        }
        return $types;
    }

    /**
     * Get all music studio.
     * @return null
     */
    public function get_music_studios()
    {
        $studios = $this->music_model->get_studios();
        if (count($studios) == 0)
        {
            return null;
        }
        return $studios;
    }
    /**
     * Enables the use of global CI object.
     * @param $var
     * @return mixed
     */
    public function __get($var)
    {
        return get_instance()->$var;
    }
}