<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/11/13
 * Time: 9:23 PM
 * To change this template use File | Settings | File Templates.
 */
class Menu_Model extends CI_Model
{
    private $menu_db;
    public function __construct(){
        parent::__construct();
        $this->menu_db = $this->load->database("default", TRUE);
    }

    /**
     * @return mixed
     */
    public function select_menu()
    {
        return $this->menu_db->select("sk_type.*, sk_categories.name as cat_name, sk_categories.description as cat_description")
            ->from("sk_type")->join("sk_categories", "sk_categories.id = sk_type.cat_id")->get()->result();
    }

}