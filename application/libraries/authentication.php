<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/**
 * This library help authenticate staff.
 *
 * @author Rithy Chhen, Ine.com
 * @since January 8 2013
 *
 */

class Authentication
{
    /**
     * Load dependencies
     */
    public function __construct()
    {
        $this->load->library(array('session', 'form_validation'));
        $this->load->model(array('staff_model'));
        $this->load->helper(array('string', 'ri'));
    }

    /**
     * login function.
     * @return bool|string
     */
    public function login ()
    {
        $this->form_validation->set_rules("ri_admin_username", "Username", "required");
        $this->form_validation->set_rules("ri_admin_password", "Password", "required");
        if ($this->form_validation->run() == FALSE)
        {
            return strip_tags(validation_errors());
        }
        $username = strtolower(trim($this->input->post("ri_admin_username")));
        $password = md5($this->input->post("ri_admin_password"));
        // encrypt the password
        $the_admin = $this->staff_model->select_staff($username, "username");
        if ($the_admin == FALSE)
        {
            return "Username doesn't exist in our system.";
        }
        if ($password != $the_admin->password) {
            return "Password is incorrect";
        }
        $session_data = array(
            "admin_login" => TRUE,
            "admin_id" => $the_admin->id,
            "admin_username" => $the_admin->username,
        );
        // set universal session
        $this->session->set_userdata($session_data);
        return TRUE;
    }

    /**
     * Password for
     * @return string
     */
    public function generate_password()
    {
        $email_address = trim($this->input->post("email"));
        $member = $this->staff_model->select_staff($email_address, "email");
        if ($member == FALSE){
            return "Your email doesn't exist in our system.";
        }
        $new_password = $this->generateRandomString(8);
        $md5_password = md5($new_password);
        $update = array(
            "password" => $md5_password,
        );
        if ($this->staff_model->update_staff($update, $email_address, "email") == FALSE) {
            return "Unable to update.";
        }
        //send email to the member.
        $the_message = "Your Temporary Password is: " . $new_password;
        if ($this->send_email($email_address, $the_message, $the_subject = "Request Password") == FALSE)
        {
            return "Unable to send email";
        };
        return TRUE;
    }
    /**
     * Check if staff is logged in.
     * @return bool
     */
    public function is_logged_in()
    {
        if ($this->session->userdata('admin_login')) {
            return TRUE;
        }
        return FALSE;
    }
    public function logout()
    {
        $this->session->unset_userdata('admin_login');
    }

    /**
     * @param $the_to_email
     * @param $the_message
     * @param string $the_subject
     * @return bool|string
     */
    protected function send_email($the_to_email, $the_message, $the_subject = "verify_email_subject")
    {
        $email_config = Array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'daviravant@gmail.com',
            'smtp_pass' => '010388rc',
            'mailtype'  => 'html',
            'starttls'  => true,
            'newline'   => "\r\n"
        );
        $this->load->library('email', $email_config);
        $this->email->from('daviracvant@gmail.com', "Daviracvant");
        $this->email->to($the_to_email);
        $this->email->subject($this->lang->line($the_subject));
        $this->email->message($the_message);

        if (!$this->email->send()) {
            return FALSE;
        }
        // email sent
        return TRUE;
    }

    /**
     * @param int $length
     * @return string
     */
    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
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
} // end register class

