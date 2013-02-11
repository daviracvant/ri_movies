<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/8/13
 * Time: 12:05 AM
 * To change this template use File | Settings | File Templates.
 */

class Music_Model extends CI_Model
{
    private $music_db;
    public function __construct(){
        parent::__construct();
        $this->music_db = $this->load->database("default", TRUE);
    }

    /**
     * Insert music.
     * @param $post
     * @return mixed
     */
    public function insert_music($post)
    {
        return $this->music_db->insert("sk_music", $post);
    }
    /**
     * Get music type.
     * @return mixed
     */
    public function get_music_type()
    {
        return $this->music_db->select()->from("sk_type")->where("cat_id", 3)->get()->result();
    }

    public function get_studios()
    {
        return $this->music_db->select()->from("sk_studio")->get()->result();
    }

    public function select_singers()
    {
        return $this->music_db->select()->from("sk_singers")->get()->result();
    }
}