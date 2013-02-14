<div id="main-content">
    <div class="row-fluid">
        <legend><h2>Music List </h2> </legend>
        <div class="hidden" id="test_container"></div>
        <?php if(isset($songs)):?>
        <table class="table table-striped tablesorter">
            <thead>
                <th></th>
                <th class="sort">Title</th>
                <th class="sort">Type</th>
                <th class="sort">Studio</th>
                <th class="sort">Release Date</th>
                <th class="sort">Singer</th>
                <th class="sort">Upload By</th>
                <th class="sort">Upload On</th>
            </thead>
            <tbody>
            <?php foreach($songs as $song):?>
                <tr>
                    <td>
                        <a class="admin_play_song" data-path="<?=$song->path?>" data-extension="<?$song->extension?>">
                        <i class="iconfa-play-circle"></i><?=$song->extension?>
                        </a>
                    </td>
                    <td><?=$song->title?></td>
                    <td><?=$song->type_description?></td>
                    <td><?=$song->studio?></td>
                    <td><?=$song->release_date?></td>
                    <td><?=$song->singer_name?></td>
                    <td><?=$song->first_name?> <?=$song->last_name?></td>
                    <td><?=date("Y-m-d H:i:s", $song->created_on)?></td>
                </tr>
            <?php endforeach?>

            </tbody>
        </table>
        <?php else:?>
        <div class="alert"><?=$message?></div>
        <?php endif?>
    </div>
    <div class="hidden" id="menu_submenu" data-menu="music" data-item="view_music"></div>
</div>
