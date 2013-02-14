<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/12/13
 * Time: 11:21 PM
 * To change this template use File | Settings | File Templates.
 */
class Video_Model extends CI_Model
{
    private $my_num_per_page = 20;
    private $video_db;
    public function __construct()
    {
        parent::__construct();
        $this->video_db = $this->load->database("default", TRUE);
    }

    public function get_counts(array $where)
    {
        $result = $this->video_db->select("id")->from("sk_movies")->where($where)->get()->result();
        return count($result);
    }
    /**
     * @param int $offset
     * @param int $type_id
     * @param string $filter
     * @return mixed
     */
    public function get_songs($offset = 0, $type_id = 25, $filter = "type_id", $studio_id = FALSE, $filter2 = FALSE)
    {
        $offset *= $this->my_num_per_page;
        $this->video_db->select("sk_movies.*, sk_member.first_name, sk_member.id as member_id, sk_member.last_name")->from("sk_movies")
            ->where($filter, $type_id);
        if ($studio_id) {
            $this->video_db->where($filter2, $studio_id);
        }
        $this->video_db->join("sk_member", "sk_member.id = sk_movies.member_id");
        return $this->video_db->order_by("sk_movies.created_on", "desc")->limit($this->my_num_per_page, $offset)->get()->result();
    }
    /**
     * Get music type.
     * @return mixed
     */
    public function get_video_type()
    {
        return $this->video_db->select()->from("sk_type")->where_not_in("cat_id", 2)->get()->result();
    }

    /**
     * Insert a new video entry.
     * @param $entry
     * @return mixed
     */
    public function insert_video($entry)
    {
        return $this->video_db->insert("sk_movies", $entry);
    }

    /**
     * Select one video.
     * @param $filter
     * @param $needle
     * @return mixed
     */
    public function select_one($filter, $needle)
    {
        return $this->video_db->select("sk_movies.*, sk_member.first_name, sk_member.id as member_id, sk_member.last_name")->from("sk_movies")->where($filter, $needle)
            ->join("sk_member", "sk_member.id = sk_movies.member_id")
            ->order_by("sk_movies.created_on", "desc")->limit(1)->get()->result();
    }

    /**
     * Select video by members that is different then the current video.
     * @param $member_id
     * @param $current_video_id
     * @return mixed
     */
    public function select_all($needle, $current_video_id, $filter = "member_id", $limit = TRUE, $offset = 0)
    {
        $offset *= $limit;
        $this->video_db->select("sk_movies.*, sk_member.first_name, sk_member.id as member_id, sk_member.last_name")->from("sk_movies")
            ->where($filter, $needle)->where("sk_movies.id !=", $current_video_id)
            ->join("sk_member", "sk_member.id = sk_movies.member_id");
        if ($limit)
        {
            $this->video_db->limit($this->my_num_per_page, $offset);
        }
        return $this->video_db ->order_by("sk_movies.created_on", "desc")->get()->result();
    }
}