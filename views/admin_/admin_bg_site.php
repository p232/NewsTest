<h3>Add page</h3>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="color_bg"><?= $data['bg_site'][0]['config'];?></label>
        <input type="color" id="color_bg" name="<?= $data['bg_site'][0]['id'];?>" value="<?= $data['bg_site'][0]['value'];?>" class="form-control"/>
    </div>
    <input type="submit" value="Ok" class="btn btn-success"/>
</form>
<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="color_header"><?= $data['bg_site'][1]['config'];?></label>
        <input type="color" id="color_header" name="<?= $data['bg_site'][1]['id'];?>" value="<?= $data['bg_site'][1]['value'];?>" class="form-control"/>
    </div>
    <input type="submit" value="Ok" class="btn btn-success"/>
</form>