<div id="main-content">
    <div class="row-fluid">
        <legend><h2>Upload Music</h2></legend>
        <form action="<?php echo base_url('admin/music/upload')?>" method="POST" id="music_upload">
            <table class="table table-striped">
                <tr>
                    <td>Title *</td>
                    <td>Release Date</td>
                    <td>File</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="title" placeholder="Title"/>
                    </td>
                    <td>
                        <select name="release_date">
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                        </select>
                    </td>
                    <td>
                        <input type="file" name="music_file"/>
                    </td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>Studio</td>
                    <td>Singer</td>
                </tr>
                <tr>
                    <td>
                        <select name="music_type">
                            <option value>Select Type</option>
                            <?php foreach ($type as $t): ?>
                            <option value="<?=$t->id?>:<?=$t->cat_id?>"><?=ucfirst ($t->name)?></option>
                            <?php endforeach?>
                        </select>
                    </td>
                    <td>
                        <select name="music_studio">
                            <option value>Select Studio</option>
                            <?php foreach ($studios as $studio): ?>
                            <option value="<?=$studio->id?>"><?=ucfirst($studio->name)?></option>
                            <?php endforeach?>
                        </select>
                    </td>
                    <td>
                        <select name="music_singer">
                            <option value>Select Signer</option>
                            <?php foreach ($singers as $singer):?>
                            <option value="<?=$singer->id?>"><?=ucfirst($singer->name)?></option>
                            <?php endforeach?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan=3>
                        <input type="submit" class="btn btn-primary" value="Upload Music">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <div class="hidden" id="menu_submenu" data-menu="music" data-item="upload_music"></div>
</div>
