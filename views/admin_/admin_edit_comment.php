<?php
//echo "<pre>";
//print_r($data);
//echo "</pre>";
//?>
<form method="post" action="" >
    <input type="hidden" name="id_comment" value="<?= $data[0]['id_comment'] ?>"/>
    <div class="form-group">
        <label for="comment">Комментарий:</label>
            <textarea rows="8" id="comment" name="comment"
                      class="form-control"><?= $data[0]['comment'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="like">Количество лайков:</label>
        <input type="text" id="like" name="like" value="<?= $data[0]['cnt_like'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="dislike">Количество дизлайков:</label>
        <input type="text" id="dislike" name="dislike" value="<?= $data[0]['cnt_dislike'] ?>"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="is_active">Publish</label>
        <input type="checkbox" id="is_active" name="is_active"
               <?php if ($data[0]['is_active']) { ?>checked="checked" <?php } ?> />
    </div>
    <input type="submit" class="btn btn-success"/>
</form>
