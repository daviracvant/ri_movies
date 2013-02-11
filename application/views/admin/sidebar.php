<div id="base_url" class="hidden"><?php echo base_url()?></div>
<!-- Start Sidebar -->
<div id="sidebar">
<!-- Start Profile Panel -->
<div class="profile" data-detach="profile">
    <div class="profile-pic"><img src="<?php echo base_url('assets/img/avatar/avatar5.png')?>"></div>
    <div class="profile-info">
        <span class="name"><?=$user->first_name;?> <?=$user->last_name?></span>
<!--        <span class="job">Test</span>-->
    </div>
    <div class="profile-panel">
        <!-- Start Messages -->
        <div class="profile-panel-menu" id="panel-message">
            <a href="#" data-toggle="dropdown" class="menu">
                <i class="icon icon-envelope"></i>
                <span class="text">Messages</span>
                <span class="label label-important">13</span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li class="header">Your Message</li>
                <div class="dropdown-menu-item" data-scroll="viewport">
                    <li><a href="#">
                        <i class="icon-user large"></i>
                        <div class="detail">
                            <span class="name">Jane Anderson</span>
                            <span class="message">Hi!.. How are you?...</span>
                            <span class="datetime">Today 3.50pm</span>
                        </div>
                    </a></li>
                    <li class="unread"><a href="#">
                        <i class="icon-user large"></i>
                        <div class="detail">
                            <span class="name">Johan Ahmad</span>
                            <span class="message">Hello john... I need your help</span>
                            <span class="datetime">Today 1.20am</span>
                        </div>
                    </a></li>
                    <li><a href="#">
                        <i class="icon-user large"></i>
                        <div class="detail">
                            <span class="name">James Kimi</span>
                            <span class="message">Hey men. Meet me at this place asd asda asd</span>
                            <span class="datetime">Today 3.50pm</span>
                        </div>
                    </a></li>
                    <li><a href="#">
<!--                        <img src="assets/img/avatar/avatar4.png">-->
                        <i class="icon-user large"></i>
                        <div class="detail">
                            <span class="name">Amanda Lim</span>
                            <span class="message">Good day john!</span>
                            <span class="datetime">yesterday 10.17am</span>
                        </div>
                    </a></li>
                    <li class="loader"><img src="<?php echo base_url('assets/img/spinner/103.gif')?>"></li>
                </div>
                <li class="footer"><a href="#">More Message</a></li>
            </ul>
        </div><!-- End Messages -->

        <!-- Start Notification -->
        <div class="profile-panel-menu" id="panel-notification">
            <a href="#" data-toggle="dropdown" class="menu">
                <i class="icon icon-bell"></i>
                <span class="text">Notifications</span>
                <span class="label label-important">30</span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li class="header">Notifications</li>
                <div class="dropdown-menu-item">
                    <li><a href="#">
                        <i class="icon iconfugue16-alarm-clock-blue"></i>
                        <div class="detail">
                            <span class="message">Schedule backup complete</span>
                            <span class="datetime">15 Minute ago</span>
                        </div>
                    </a></li>
                    <li class="unread"><a href="#">
                        <i class="icon iconfugue16-database"></i>
                        <div class="detail">
                            <span class="message">Check your database configurations</span>
                            <span class="datetime">15 Minute ago</span>
                        </div>
                    </a></li>
                    <li><a href="#">
                        <i class="icon iconfugue16-user-silhouette"></i>
                        <div class="detail">
                            <span class="message">Someone is trying to access your accound</span>
                            <span class="datetime">1 Hour ago</span>
                        </div>
                    </a></li>
                    <li><a href="#">
                        <i class="icon iconfugue16-cheque"></i>
                        <div class="detail">
                            <span class="message">Cheque is sent</span>
                            <span class="datetime">3 Hour ago</span>
                        </div>
                    </a></li>
                    <li class="loader"><img src="<?php echo base_url('assets/img/spinner/103.gif')?>"></li>
                </div>
                <li class="footer"><a href="#">Clear All</a></li>
            </ul>
        </div><!-- End Notification -->
    </div>
</div><!-- End Profile Panel -->

<!-- Start Main Menu -->
<ul class="nav-mainmenu" id="nav-mainmenu">
        <li class="accordion-group">
            <a data-toggle="collapse" data-parent="#nav-mainmenu" href="#user" id="menu_user" class="menu_icon">
                <span class="icon iconfa-user"></span><span class="text">User</span></a>
            <ul class="nav-submenu collapse" id="user">
                <li><a class="sub_menu_item" id="submenu_profile" href='<?=base_url("admin/user/edit_profile")?>'>
                    <i class="iconfa-edit"></i> Profile</a></li>
            </ul>
        </li>

    <li class="accordion-group">
        <a data-toggle="collapse" data-parent="#nav-mainmenu" href="#music" id="menu_music" class="menu_icon">
            <span class="icon iconfa-music"></span><span class="text">Music</span></a>
        <ul class="nav-submenu collapse" id="music">
            <li>
                <a class="sub_menu_item" id="submenu_view_music" href="#">
                <i class="iconfa-folder-open"></i> View All</a>
            </li>
            <li>
                <a class="sub_menu_item" id="submenu_upload_music" href="<?=base_url('admin/music/upload')?>">
                    <i class="iconfa-upload"></i> Upload</a>
            </li>

        </ul>
    </li>
</ul>
</div><!-- End Sidebar -->