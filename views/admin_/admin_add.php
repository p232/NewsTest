    <h3>Add page</h3>
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title_news">Title</label>
            <input type="text" id="title_news" name="title_news" value="" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea rows="8" id="content_news" name="content_news" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="id_category">Category</label>
            <select class="form-control" name="id_category" id="id_category">
                <?php foreach ($data['category'] as $key=>$value): ?>
                    <option value="<?=$key;?>"><?=$value;?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="checkbox">
            <p style="font-weight:600;">Tags</p>
            <?php foreach ($data['tags'] as $key=>$value): ?>
                <label class="checkbox-inline">
                    <input type="checkbox" name="tags[]" value="<?= $key; ?>"><?=$value; ?>
                </label>
         <?php endforeach; ?>
        </div>
        <div class="form-group">
            <label for="is_published">is_published</label>
            <input type="checkbox" id="is_published" name="is_published" checked="checked"/>
        </div>
        <div class="form-group">
            <label for="is_analitic">Analitic</label>
            <input type="checkbox" id="is_analitic" name="is_analitic"
        </div><br/>
        <div class="form-group">
            <label for="photo">File input:</label>
<!--            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />-->
            <input type="file" name="photo" id="photo" >
            <p class="help-block">Please download your pictures(jpg, png, gif).Max size 3mb,max picture-1</p>
        </div>
        <input type="submit" class="btn btn-success"/>
    </form>
