<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/13/13
 * Time: 10:08 PM
 * To change this template use File | Settings | File Templates.
 */

class Comment_Model extends CI_Model
{
    private $comment_db;

    public function __construct()
    {
        parent::__construct();
        $this->comment_db = $this->load->database("default", TRUE);
    }

    public function select_comments($video_id)
    {
        return $this->comment_db->select("sk_movies_comments.*, sk_member.id as member_id, sk_member.first_name, sk_member.last_name")
        ->from("sk_movies_comments")->where("video_id", $video_id)
        ->join("sk_member" ,"sk_member.id = sk_movies_comments.member_id")->get()->result();

    }

    public function select_response($video_id)
    {
        return $this->comment_db->select("sk_comments_replies.*, sk_member.id as member_id, sk_member.first_name, sk_member.last_name")
            ->from("sk_comments_replies")->where("video_id", $video_id)
            ->join("sk_member" ,"sk_member.id = sk_comments_replies.member_id")->get()->result();

    }
}