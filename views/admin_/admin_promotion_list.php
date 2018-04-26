<?php
//echo "<pre>";
//print_r($data);
//echo "</pre>";
//?>
<h6>Первые блоки слева и справо-по количеству кликов;остальные по 3 блока по бокам -
рандомные активные;неактивные не учавствуют;</h6>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Имя продукта:</th>
            <th>Цена:</th>
            <th>Фирма:</th>
            <th>Кол_кликов:</th>
            <th>Сайт</th>
            <th>Активная:</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['admin_promotion'] as $key => $value) : ?>
            <?php if($key==='count')break;  ?>
            <tr>
                <td><?= $value['product_name'] ?></td>
                <td><?= $value['price'] ?></td>
                <td><?= $value['firm'] ?></td>
                <td><?= $value['cnt'] ?></td>
                <td><?= ($value['site'])? 'yes' :'no'; ?></td>
                <td><?=  ($value['is_active'])? 'yes' :'no'; ?></td>
                <td align="right">
                    <a href="/admin/promotions/edit_promotion/<?= $value['id'] ?>">
                        <button class="btn btn-sm btn-block btn-primary">edit</button>
                    </a>
                    <a href="/admin/promotions/delete/<?= $value['id'] ?>" onclick="return confirmDelete();">
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
    <?php for ($j = 1; $j <= ($data['admin_promotion']['count']); $j++) : ?>
        <li <?= ($j == $_GET['pages']) ? 'class=active' : ''; ?>><a
                href="/admin/promotions/promotion_list/?pages=<?= $j; ?>"><?= $j; ?></a></li>
    <?php endfor; ?>
</ul>
