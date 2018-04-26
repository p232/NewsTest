<div class="starter-template">
    <?php if (isset($data['category_list']))  : ?>
        <h2>Категории новостей</h2>
        <ul class="list-unstyled">
            <?php foreach ($data['category_list'] as $key => $value): ?>
                <li><a href="/category/list/<?= $key; ?>"><?= $value; ?></a></li>
            <?php endforeach; ?>
        </ul>

    <?php else : ?>
        <h2><?= $data['category'][0]['category_name']; ?></h2>
        <?php for ($i = 0; $i < count($data['category']); $i++) : ?>
            <ul class="list-unstyled">
                <li>
                    <a href="/news/list/<?= $data['category'][$i]['id_news']; ?>"><?= $data['category'][$i]['title_news']; ?></a>
                </li>
            </ul>
        <?php endfor; ?>

    <?php endif; ?>
</div>
