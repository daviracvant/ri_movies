<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 1/22/13
 * Time: 11:11 PM
 * To change this template use File | Settings | File Templates.
 */
Class staff_model extends CI_Model
{
    private $my_db;
    public function __construct()
    {
        parent::__construct();
        $this->my_db = $this->load->database("default", TRUE);
    }

    /**
     * Select an entry base on the needle, and the filter.
     * @param $the_needle
     * @param string $the_filter
     * @return mixed
     */
    public function select_staff($the_needle, $the_filter = "id")
    {
        $result = $this->my_db->select()->from("sk_member")->where($the_filter, $the_needle)->get()->result();
        if (count($result) == 0) {
            return FALSE;
        }
        return $result[0];
    }

    public function update_staff($the_update, $the_needle, $the_filter)
    {
        $update["modified_on"] = time();
        return $this->my_db->where($the_filter, $the_needle)->update("sk_member", $the_update);

    }
}