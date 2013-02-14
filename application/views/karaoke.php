<div id="main-content">
    <div class="row-fluid">
        <div class="span12">
            <legend>Khmer Karaoke</legend>
            <?php if (isset($error)): ?>
            <div class="span12">
            <div class="alert alert-success"><?=$error?></div>
            </div>
            <?php else: ?>
            <div class="span12" style="margin-left:0px;text-align:right;" >
                <select name="karaoke/khmer" id="sk_filer" class="span3">
                    <option value='0'>No Filter</option>
                    <?php foreach ($studios as $studio):?>
                    <option value="<?=$studio->id?>" <?=(isset($set_studio_id) &&($set_studio_id == $studio->id))?"selected":null?>>
                        <?=$studio->description?>
                    </option>
                    <?php endforeach?>
                </select>
            </div>
            <?php if (isset($karaokes)):?>
            <?php foreach ($karaokes as $karaoke): ?>
                <div class="span3" style="margin-left:15px;">
                    <div class="info-column">
                        <a href="<?=base_url('video/play/' . $karaoke->id)?>">
                        <img class="img-rounded" src="<?=$karaoke->thumbnail?>" alt=""></a>
                        <p>
                            <a href="<?=base_url('video/play/' . $karaoke->id)?>"><?=$karaoke->title?></a>
                            <br/>by:
                            <a href="#"><?=$karaoke->first_name?> <?=$karaoke->last_name?></a>
                            <span style="margin-left:25px;color:lightgray"><i><?=date("F d Y", $karaoke->created_on)?></i></span>
                        </p>
                        <a class="btn btn-primary" href="<?=base_url('video/play/' . $karaoke->id)?>">
                            <i class="icon-play"></i> Play</a>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="span12">
                <div class="pagination pagination-centered">
                    <ul>
                        <?php if ($page != 0) : ?>
                        <li><a href="<?=base_url('karaoke/khmer/' . ($page - 1));?>">Prev</a></li>
                        <?php endif?>
                        <?php for ($i = $lower_bound; $i < $upper_bound; $i++): ?>
                        <li <?=($page == $i) ? "class='disabled'" : null?>><a
                                href="<?=base_url('karaoke/khmer/' . $i)?>"><?=$i + 1?></a></li>
                        <?php endfor?>
                        <?php if (count($karaokes) == 20): ?>
                        <li><a href="<?=base_url('karaoke/khmer/' . ($page + 1));?>">Next</a></li>
                        <?php endif?>
                    </ul>
                </div>
            </div>
            <?php else:?>
                <div class="span12" style="margin-left:0px;"><div class="alert alert-success"><?=$message?></div></div>
                <?php if ($page != 0): ?>
                <div class="span12">
                <div class="pagination pagination-centered">
                    <ul>
                        <li><a href="<?=base_url('karaoke/khmer/' . ($page - 1));?>">Prev</a></li>
                        <li class="disabled"><a href="#"><?=$page+1?></a></li>
                    </ul>
                </div>
                </div>
                <?php endif?>
            <?php endif?>
            <?php endif?>
        </div>
    </div>
</div>