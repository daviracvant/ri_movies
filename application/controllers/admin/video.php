<?php
/**
 * Created by JetBrains PhpStorm.
 * User: RITHY
 * Date: 2/5/13
 * Time: 12:52 AM
 * To change this template use File | Settings | File Templates.
 */
class Video extends MY_Controller {


    public function __construct() {
        parent::__construct();
    }

    public function upload()
    {
        if ($this->input->post()) {
            //do the upload.
        }
        echo "here";
    }
}