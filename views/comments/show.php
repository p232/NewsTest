<div class="starter-template">
    <?php foreach ($data['comment'] as $key => $value): ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Написал: <a><?= $value['login'] ?> </a>
                    Дата\Время: <?= $value['date_time'] ?>
                </h3>
            </div>
            <div class="panel-body"><?= $value['comment'] ?></div>
            <div class="panel-footer" style="padding: 4px 15px; overflow: hidden;">Заголовок
                новости:<?= $value['title_news'] ?></div>
        </div>
    <?php endforeach; ?>
</div>
<?php if (!isset($_GET['pages'])) $_GET['pages'] = 1; ?>
<ul class="pagination">
    <?php for ($j = 1; $j <= ($data['count_page']); $j++) : ?>
        <li <?= ($j == $_GET['pages']) ? 'class=active' : ''; ?>><a
                href="/comments/show/<?= $data['comment'][0]['id_user'] ?>/?pages=<?= $j; ?>"><?= $j; ?></a></li>
    <?php endfor; ?>
</ul>
