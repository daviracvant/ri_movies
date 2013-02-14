<div id="login-content">
    <div class="row-fluid">
        <div class="span4 offset4">
            <div class="widget">
                <div class="widget-content">
                    <div class="widget-content-inner" style="margin-left:20px;">

                        <legend><b>SK Admin Login</b></legend>
                        <!-- Start Login Form -->
                        <div class="login-area">
                            <!-- End Returning User -->
                            <form method="POST" action="<?php echo base_url('admin/home/login')?>" id="sk_login">
                                <fieldset>Username:</fieldset>
                                <input type="text" name="ri_admin_username" />
                                <fieldset>Password:</fieldset>
                                <input type="password" name="ri_admin_password" />
                                <a class="reset_password">Forgot Password?</a>
                                <hr/>
                                <input class="btn btn-primary" type="submit" value="Login"/>
                            </form>
                        </div>
                        <!-- End Login Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="base_url" class="hidden"><?php echo base_url()?></div>
</div>