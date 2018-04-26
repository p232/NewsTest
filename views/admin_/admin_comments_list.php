<?php
//echo "<pre>";
//print_r($data);
//echo "</pre>";
//?>
<h6>**Коментарии в  категории "Политика" нужно одобрить </h6>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Комментарий:</th>
            <th>Имя:</th>
            <th>Новость:</th>
            <th>Категория:</th>
            <th>Дата добавления:</th>
            <th>Выводится:</th>
            <th>Лайков:</th>
            <th>Дизлайков:</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['comments'] as $key => $value) : ?>
            <?php if ($key === 'count') break; ?>
            <tr>
                <td><?= $value['comment'] ?></td>
                <td><?= $value['login'] ?></td>
                <td><?= $value['title_news'] ?></td>
                <td><?= $value['category_name'] ?></td>
                <td><?= $value['date_time']?></td>
                <td><?= ($value['is_active'])? 'yes' :'no'; ?></td>
                <td><?= $value['cnt_like'] ?></td>
                <td><?= $value['cnt_dislike'] ?></td>
                <td align="right">
                    <a href="/admin/comments/edit_comment/<?= $value['id_comment'] ?>">
                        <button class="btn btn-sm btn-block btn-primary">edit</button>
                    </a>
                    <a href="/admin/comments/delete_comment/<?= $value['id_comment'] ?>" onclick="return confirmDelete();">
                        <button class="btn btn-sm btn-block btn-warning">delete</button>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tbody>
    </table>
</div>
<br/>
<?php if (!isset($_GET['pages'])) $_GET['pages'] = 1; ?>
<ul class="pagination pagination-sm">
    <?php for ($j = 1; $j <= ($data['comments']['count']); $j++) : ?>
        <li <?= ($j == $_GET['pages']) ? 'class=active' : ''; ?>><a
                href="/admin/comments/comments_list/?pages=<?= $j; ?>"><?= $j; ?></a></li>
    <?php endfor; ?>
</ul>
