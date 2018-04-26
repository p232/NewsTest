<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID:</th>
            <th>Name:</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['category'] as $key => $value) : ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
                <td align="right">
                    <a href="/admin/news/delete_category/<?= $key ?>" onclick="return confirmDelete();">
                        <button class="btn btn-sm btn-warning">delete</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tbody>
    </table>
</div>
<h2>Добавить категорию:</h2>
<div class="controls">
    <form method="post" autocomplete="off">
        <div class="entry input-group " >
            <input class="form-control" name="new_categories[]" type="text" placeholder="Type something">
                <span class="input-group-btn">
              <button class="btn btn-success btn-add" type="button">
                  <span class="glyphicon glyphicon-plus"></span>
              </button>
                </span>
        </div>
        <br> <input type="submit" name="submit" class="btn btn-success"/>
    </form>
</div>
<br>
<small>
    Press
    <span class="glyphicon glyphicon-plus gs"></span>
    to add another form field :)
</small>

