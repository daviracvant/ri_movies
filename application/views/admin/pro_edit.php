<div id="main-content">
    <div class="row-fluid">
        <legend><h2>Account Setting</h2></legend>
        <div class="span12" style="margin-left:0px;">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Edit Profile</a></li>
                    <li><a href="#tab2" data-toggle="tab">Edit Password</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <form action="<?=base_url('admin/user/edit_profile')?>" method="POST"
                              id="submit_edit_profile">
                            <input type="hidden" value="<?=$user->id?>" name="id"/>
                            <table class="table">
                                <tr>
                                    <td>First Name *</td>
                                    <td colspan=4>Last Name *</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="first_name" value="<?=$user->first_name?>" style="width:100%">
                                    </td>
                                    <td colspan=4>
                                        <input type="text" name="last_name" value="<?=$user->last_name?>" style="width:60%">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Username *</td>
                                    <td colspan=4>Email *</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="username" value="<?=$user->username?>" style="width:100%">
                                    </td>
                                    <td colspan=4>
                                        <input type="text" name="email" value="<?=$user->email?>" style="width:60%">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>City</td>
                                    <td>Province</td>
                                    <td>Postal Code</td>
                                    <td>Country</td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="address" value="<?=$user->addr?>" style="width:100%"></td>
                                    <td><input type="text" name="city" value="<?=$user->city?>" style="width:100%"></td>
                                    <td><input type="text" name="province" value="<?=$user->province?>" style="width:100%"></td>
                                    <td><input type="text" name="postal_code" value="<?=$user->postal_code?>">
                                    </td>
                                    <td><input type="text" name="country" value="<?=$user->country?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan=5>
                                        <input type="submit" class="btn btn-primary btn-small" value="Save Changes">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <form action="<?php echo base_url('admin/user/change_password')?>" method="POST"
                              id="submit_change_pw">
                            <table class="table table-striped">
                                <input type="hidden" name="user_id" value="<?=$user->id?>">
                                <tr>
                                    <td>Old Password *</td>
                                    <td><input type="password" name="old_password"></td>
                                </tr>
                                <tr>
                                    <td>New Password *</td>
                                    <td><input type="password" name="new_password"></td>
                                </tr>
                                <tr>
                                    <td>Confirmed Password *</td>
                                    <td><input type="password" name="confirm_password"></td>
                                </tr>
                                <tr>
                                    <td colspan=2><input type="submit" value="Save Changes" class="btn btn-primary btn-small"/></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden" id="menu_submenu" data-menu="user" data-item="profile"></div>
</div>

