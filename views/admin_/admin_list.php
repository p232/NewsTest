<?php
//echo "<pre>";
//print_r($data);
//echo "</pre>";
//?>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Заголовок:</th>
            <th>Категория:</th>
            <th>Дата добавления:</th>
            <th>Выводится:</th>
            <th>Аналитическая:</th>
            <th>Посещений:</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $key => $value) : ?>
            <?php if ($key === 'count') break; ?>
            <tr>
                <td><?= $value['title_news'] ?></td>
                <td><?= $value['category_name'] ?></td>
                <td><?= $value['date_news'] ?></td>
                <td><?= ($value['is_published'])? 'yes' :'no'; ?></td>
                <td><?= ($value['is_analitic'])? 'yes' :'no'; ?></td>
                <td><?= $value['cnt_visit'] ?></td>
                <td align="right">
                    <a href="/admin/news/edit/<?= $value['id_news'] ?>">
                        <button class="btn btn-sm btn-block btn-primary">edit</button>
                    </a>
                    <a href="/admin/news/delete/<?= $value['id_news'] ?>" onclick="return confirmDelete();">
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
    <?php for ($j = 1; $j <= ($data['count']); $j++) : ?>
        <li <?= ($j == $_GET['pages']) ? 'class=active' : ''; ?>><a
                href="/admin/index/list/?pages=<?= $j; ?>"><?= $j; ?></a></li>
    <?php endfor; ?>
</ul>
