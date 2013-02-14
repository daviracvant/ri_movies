<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/7/13
 * Time: 9:49 PM
 * To change this template use File | Settings | File Templates.
 */
class User extends MY_Controller
{
    private $my_data;

    public function __construct()
    {
        parent::__construct();
        $this->_admin_css_js();
        $this->_pack_css_js();
        $this->_redirect_admin_login();
        $this->load->library("admin");
        $this->my_data['carabiner'] = $this->carabiner;
    }

    /**
     * A controller to edit profile.
     * @param null $user_id
     */
    public function edit_profile()
    {
        if ($this->input->post()) {
            $response = $this->admin->edit_profile();
            if (is_string($response)) {
                echo json_encode(array("status"=>0, "message" => $response));
                exit;
            } else {
                echo json_encode(array("status"=>1, "message"=> "User profile has been updated successfully."));
                exit;
            }
        }
        $this->my_data["user"] = $this->my_user;;
        $this->_output_html("admin", "admin/pro_edit", $this->my_data);

    }

    /**
     * controller for changing a pw.
     */
    public function change_password()
    {
        if($this->input->post()) {
            $response = $this->admin->pw_change();
            if (is_string($response)) {
                echo json_encode(array("status"=>0, "message" => $response));
            } else {
                echo json_encode(array("status"=>1, "message" => "Password has been changed successfully."));
            }
        }
    }
}