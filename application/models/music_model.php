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

    public function select_all_songs()
    {
        $query = "select sk_music.*, sk_member.first_name, sk_member.last_name, sk_singers.name as singer_name, sk_type.description as type_description, sk_studio.description as studio
from sk_music
join sk_member on sk_music.member_id = sk_member.id
join sk_singers on sk_music.singer_id = sk_singers.id
join sk_type on sk_music.type_id = sk_type.id
join sk_studio on sk_studio.id = sk_music.studio_id";
        return $this->music_db->query($query)->result();
    }
}