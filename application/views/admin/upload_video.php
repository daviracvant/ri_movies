<div id="main-content">
    <div class="row-fluid">
        <legend><h2>Upload Video</h2></legend>
        <form action="<?php echo base_url('admin/video/upload')?>" method="POST" id="video_upload">
            <table class="table table-striped">
                <tr>
                    <td>Title *</td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="title" placeholder="Title"/>
                    </td>
                </tr>
                <tr>
                    <td>Type</td>
                </tr>
                <tr>
                    <td>
                    <select name="local_video">
                        <option value="youtube">YouTube</option>
                        <option value="local">Raw File</option>
                    </select>
                    </td>
                </tr>

                <tr>
                    <td>Youtube Url</td>
                </tr>
                <tr>
                    <td><input type='text' name="youtube_path" class="span6" placeholder="Input YouTube url here"/></td>
                </tr>
                <tr>
                    <td>Type</td>
                </tr>
                <tr>
                    <td>
                        <select name="video_type">
                            <?php foreach($types as $type):?>
                            <option value="<?=$type->id?>"><?=ucfirst($type->description)?></option>
                            <?php endforeach?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Studio</td>
                </tr>
                <tr>
                    <td>
                        <select name="studio">
                            <option value>None</option>
                            <?php foreach($studios as $studio):?>
                            <option value="<?=$studio->id?>"><?=$studio->description?></option>
                            <?php endforeach?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                </tr>
                <tr>
                    <td><textarea name="video_description" class="span6" rows=4></textarea></td>
                </tr>
                    <td>
                        <input type="file" name="music_file"/>
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
    <div class="hidden" id="menu_submenu" data-menu="video" data-item="upload_video"></div>
</div>
