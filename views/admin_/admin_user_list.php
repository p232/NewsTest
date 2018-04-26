<?php
//echo "<pre>";
//print_r($data);
//echo "</pre>";
//?>
<h6>Юзера(Без админа)</h6>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Логин:</th>
            <th>Почта:</th>
            <th>Роль:</th>
            <th>Пароль(md5):</th>
            <th>Активный:</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['users'] as $key => $value) : ?>
            <?php if ($key === 'count') break; ?>
            <tr>
                <td><?= $value['login'] ?></td>
                <td><?= $value['email'] ?></td>
                <td><?= $value['role'] ?></td>
                <td><?= $value['password']?></td>
                <td><?= ($value['is_active'])? 'yes' :'no'; ?></td>
                <td align="right">
                    <a href="/admin/users/delete/<?= $value['id'] ?>" onclick="return confirmDelete();">
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
    <?php for ($j = 1; $j <= ($data['users']['count']); $j++) : ?>
        <li <?= ($j == $_GET['pages']) ? 'class=active' : ''; ?>><a
                href="/admin/index/list/?pages=<?= $j; ?>"><?= $j; ?></a></li>
    <?php endfor; ?>
</ul>
