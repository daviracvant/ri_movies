<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/7/13
 * Time: 9:37 PM
 * To change this template use File | Settings | File Templates.
 */
class Admin
{
    /**
     * constructor.
     */
    public function __construct()
    {
        $this->load->library("form_validation");
        $this->load->model("staff_model");
    }

    /**
     * Get staff by id.
     * @param $staff_id
     * @return string
     */
    public function get_current_staff($staff_id)
    {
        $staff = $this->staff_model->select_staff($staff_id);
        if (count($staff) == 0)
        {
            return FALSE;
        }
        return $staff;
    }

    /**
     * Change the password.
     * @return bool|string
     */
    public function pw_change()
    {
        $this->form_validation->set_rules("old_password","Old Password", "required");
        $this->form_validation->set_rules("new_password","New Password", "required");
        $this->form_validation->set_rules("confirm_password","Confirm Password", "matches[new_password]");
        if ($this->form_validation->run() == FALSE) {
            return strip_tags(validation_errors());
        }
        $result = TRUE;
        $new_password = $this->input->post("new_password");
        $user_id = $this->input->post("user_id");
        $user = $this->staff_model->select_staff($user_id);
        if ($user) {
            $old_pw = md5(trim($this->input->post("old_password")));
            if ($old_pw == $user->password) {
                $update = array(
                    "password" => md5($new_password),
                );
                if ($this->staff_model->update_staff($update, $user_id, "id") == FALSE) {
                    $result = "Unable to update user password.";
                }
            }
        } else {
            $result = "Unable to find user";
        }
        return $result;
    }
    /**
     * Edit a user profile information.
     * @return bool|string
     */
    public function edit_profile()
    {
        $this->form_validation->set_rules("first_name", "First Name", "required");
        $this->form_validation->set_rules("last_name", "Last Name", "required");
        $this->form_validation->set_rules("username", "Username", "required");
        $this->form_validation->set_rules("email", "Email", "required");
        if ($this->form_validation->run() == FALSE) {
            return strip_tags(validation_errors());
        }
        $user_id = $this->input->post("id");
        $the_post = $this->input->post();
        $update = array(
            'first_name' => $the_post['first_name'],
            'last_name' => $the_post['last_name'],
            'username' => $the_post['username'],
            'email' => $the_post['email'],
            'addr' => $the_post['address'],
            'city' => $the_post['city'],
            'province' => $the_post['province'],
            'postal_code' => $the_post['postal_code'],
            'country' => $the_post['country']
        );
        if ($this->staff_model->update_staff($update, $user_id, 'id') == FALSE)
        {
            return "Unable to update user information.";
        }
        return TRUE;
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