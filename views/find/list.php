<div class="starter-template">
    <form method="post" action="" class="form-horizontal">
        <h2>Date:</h2>
        <div class="form-inline">
            <label for="date">date:</label>
            <input type="date" data-date-format="DD MMMM YY" class="form-control" name="date_ot" id="date"
                   placeholder="date">
            <label for="date">date:</label>
            <input type="date" class="form-control" name="date_do" id="date" placeholder="date">
        </div>
        <h2>News Tags:</h2>
        <?php foreach ($data['tags'] as $key => $tag) : ?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="tags[<?= $key ?>]" value="<?= $tag ?>"> <?= $tag ?>
                </label>
            </div>
        <?php endforeach; ?>
        <h2>News Category:</h2>
        <?php foreach ($data['category'] as $key => $category) : ?>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="category[<?= $key ?>]" value="<?= $category ?>"><?= $category ?>
                </label>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-default">Submit</button>
        <button type="reset" class="btn btn-default">Cancel</button>
    </form>
    <?php
    if (isset($data['filter'])): ?>
        <h2>Results:</h2>
        <ul class="list-unstyled">
            <?php foreach ($data['filter'] as $value): ?>
                <li><a href="/news/list/<?= $value['id_news'] ?>"><?= $value['title_news'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>