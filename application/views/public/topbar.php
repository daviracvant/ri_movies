<body>
<!-- page wrapper -->
<div class="container wrapper">
    <div id="base_url" class="hidden"><?=base_url()?></div>
    <header>
        <div class="row">
            <div class="span4">
                <h1>
                    <a href="index.html"><img src="<?=base_url('assets/img/simplykhmer.png')?>" alt=""></a>
                </h1>
            </div>
            <div class="span4">
                <ul class="social-media">
                    <li><a href="#"><i class="icon icon-twitter-sign"></i></a></li>
                    <li><a href="#"><i class="icon icon-facebook-sign"></i></a></li>
                    <li><a href="#"><i class="icon icon-google-plus-sign"></i></a></li>
                    <li><a href="#"><i class="icon icon-pinterest-sign"></i></a></li>
                </ul>
            </div>
            <div class="span4">
                <form>
                    <div class="input-append">
                        <input class="span2" id="appendedInputButtons" type="text">
                        <button class="btn btn-primary" type="button">Search</button>
                    </div>
                </form>
            </div><!-- /.span -->
        </div><!-- /.row -->
    </header>

    <div class="row">
        <div class="span12">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">Menu</a>
                        <a class="brand" href="<?=base_url()?>">SimplyKhmer</a>
                        <div class="nav-collapse collapse">
                            <ul class="nav">
                                <li><a href="<?=base_url('welcome')?>">Home</a></li>
                                <?php if (isset($menus)):?>
                                <?php foreach ($menus as $key => $menu):?>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=ucfirst($key)?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                        <li>
                                            <?php foreach ($menu as $menu_item):?>
                                            <a href="<?=base_url(). $menu_item->url?>"><?=ucfirst($menu_item->cat_name)?></a>
                                            <?php endforeach ?>
                                        </li>
                                    </ul>
                                </li>
                                    <?php endforeach?>
                                <?php endif ?>
                            </ul> <!-- /.nav -->
                        </div> <!-- /.nav-collapse -->
                    </div><!-- /container -->
                </div><!-- /navbar-inner -->
            </div><!-- /navbar -->
        </div><!-- /row -->
    </div><!-- /span12 phew! -->