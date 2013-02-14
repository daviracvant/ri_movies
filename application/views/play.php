<div id="main-content">
    <div class="row-fluid">
        <?php if(isset($error)):?>
            <div class="alert alert-success"><?=$error?></div>
        <?php else:?>
        <div class="span6">
            <div id="path" class="hidden" data-path="<?=$current_video->path?>"></div>
            <div id="thumbnail" class="hidden" data-thumbnail="<?=$current_video->thumbnail?>"></div>
            <div id="myElement">Loading the player...</div>

            <div style="margin-left:0px;padding:10px; border: 1px solid whitesmoke;"">
                <span class="lead"><?=$current_video->title?></span>
                <br/>
                <span>By <a href="#"><?=$current_video->first_name?> <?=$current_video->last_name?></a> on </span>
                <span><i><?=date("F-d-Y", $current_video->created_on)?></i></span>
            </div>

            <div class="span12" style="margin-left:0px;">
                <hr/>
                <?php if (isset($user)):?>
                    testing.
                <?php endif?>
                <hr/>
                <?php if (isset($comments)): ?>
                <h5 style="margin-left:10px;"><u>All Comments</u></h5>
                <?php foreach ($comments as $comment): ?>
                    <div class="info-column">
                        <div class="span12" style="margin-left:10px;margin-bottom:10px;">
                            <i class="icon-user icon-large"></i>
                            <a href="#"><?=$comment->first_name?> <?=$comment->last_name?></a>
                            <span style="margin-left:20px;color:gray"><i><?=date("F d Y", $comment->created_on)?></i></span>
                            <p><?=$comment->comment?></p>
                            <?php if(isset($comment->responses)):?>
                            <div class="span12" style="margin-left:50px;">
                                <?php foreach($comment->responses as $response) :?>
                                <i class="icon-user icon-large"></i>
                                <a href="#"><?=$response->first_name?> <?=$response->last_name?></a>
                                <span style="margin-left:20px;color:gray"><i><?=date("F d Y", $response->created_on)?></i></span>

                                <p><?=$response->comment?></p>
                                <?php endforeach?>
                            </div>
                            <?php endif?>
                            <span class="pull-right" style="margin-right:10px;color:gray">

                            <?php if (isset($user)): ?>
                            <a href="#" class="comment_reply"
                               data-id="<?=$comment->id?>" data-user="<?=$user->id?>" data-video="<?=$current_video->id?>">Reply</a>
                            <?php else:?>
                                <a href="#" class="comment_reply" data-user="0">Reply</a>
                            <?php endif?>
                            </span>
                        </div>
                    </div>
                    <?php endforeach ?>
                <?php endif?>
            </div>
        </div>

        <div class="span3">
            <?php if (isset($related_videos)):?>
            <?php foreach ($related_videos as $karaoke):?>
            <div class="span12" style="margin-left:0px; margin-bottom:5px;">
            <div class="info-column">
                <div class="span6">
                    <a href="<?=base_url('video/play/'. $karaoke->id)?>">
                        <img class="img-rounded" src="<?=$karaoke->thumbnail?>" alt="">
                    </a>
                </div>
                <div class="span6">
                <p>
                    <a href="<?=base_url('video/play/'. $karaoke->id)?>"><?=$karaoke->title?></a>
                    <br/>by: <a href="#"><?=$karaoke->first_name?> <?=$karaoke->last_name?></a>
                    <br/>On: <?=date("F d Y", $karaoke->created_on)?></span>
                </p>
                </div>
            </div>
            </div>
                <?php endforeach?>
            <?php endif?>
        </div>
        <?php endif?>
    </div>
</div>