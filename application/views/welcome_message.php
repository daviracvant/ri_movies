<div class="container">
    <div id="myCarousel" class="carousel slide">
        <div style="padding-bottom: 30px;">
            <a class="pull-right btn btn-mini" href="#myCarousel" data-slide="next"><i
                    class="icon-step-forward"></i></a>
            <a class="pull-right btn btn-mini" href="#myCarousel" data-slide="prev" style="margin-right: 5px"><i
                    class="icon-step-backward"></i></a>
        </div>
        <div class="carousel-inner">
            <center>
                <div class="item active">
                    <img src="<?=base_url('assets/img/slide1.jpg')?>" alt="">

                    <div class="carousel-caption">
                        <h4>Khmer Music</h4>
                    </div>
                </div>
                <div class="item">
                    <img src="<?=base_url('assets/img/slide2.jpg')?>" alt="">

                    <div class="carousel-caption">
                        <h4>Chinese Drama</h4>
                    </div>
                </div>
                <div class="item">
                    <img src="<?=base_url('assets/img/slide3.png')?>" alt="">

                    <div class="carousel-caption">
                        <h4>Thai Drama</h4>
                    </div>
                </div>
            </center>
        </div>
    </div>
    <div class="row-fluid">
        <legend>What's New</legend>
        <div class="span3" style="margin-left:0px;">
            <div class="info-column">
                <img class="img-rounded" src="<?=$karaoke->thumbnail?>" alt="">
                <p>
                    <a href="<?=base_url('video/play/'. $karaoke->id)?>"><?=$karaoke->title?></a>
                    <br/>by:
                    <a href="#"><?=$karaoke->first_name?> <?=$karaoke->last_name?></a>
                    <span class="pull-right"><?=date("F d Y", $karaoke->created_on)?></span>
                </p>
                <a class="btn btn-primary" href="#">Learn More »</a>
            </div>
        </div>
        <div class="span3">
            <div class="info-column">
                <img class="img-rounded" src="assets/team-2.jpg" alt="">
                <p>Get a handle on your finances the free and fast way. Mint does all the work of organizing and categorizing your spending for you. See where every dime goes and make money.</p>
                <a class="btn btn-primary" href="#">Learn More »</a>
            </div>
        </div>
        <div class="span3">
            <div class="info-column">
                <img class="img-rounded" src="assets/team-3.jpg" alt="">
                <p>Just click on what you want to accomplish with your money. Mint gives you the simple steps for getting there, along with free advice, gentle reminders, and encouragement.</p>
                <a class="btn btn-primary" href="#">Learn More »</a>
            </div>
        </div>
        <div class="span3">
            <div class="info-column">
                <img class="img-rounded" src="assets/team-4.jpg" alt="">
                <p>It’s easier to stick to a budget designed for your lifestyle. Mint automatically creates one tailored just for you and keeps you on track with email and mobile alerts.</p>
                <a class="btn btn-primary" href="#">Learn More »</a>
            </div>
        </div>
    </div>
</div>

