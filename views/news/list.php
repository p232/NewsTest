<?php if (!isset($data['news']['count'])): ?>
    <div style="min-height: 300px;">
        <h2 style="text-align: center;"><?= $data['title_news']; ?></h2>
        <div><?= $data['content_news']; ?></div>
        <?php if ($data['image_news']): ?>
            <div><img src="/webroot/image/<?= $data['image_news']; ?>"></div>
        <?php endif; ?>
        <br/>
    </div>
    <?php if (isset($data['tags'])): ?>
        <h3>Tags:</h3>
        <?php foreach ($data['tags'] as $key => $value): ?>
            <a href="/news/tag/<?= $key; ?>"> <input type="button" class="btn btn-primary btn-xs"
                                                     value="<?= $value; ?>"></a>
        <?php endforeach; ?>
    <?php endif; ?>
    <div style="text-align: right;">Количество просмотров: <?= $data['cnt_visit']; ?> Читают:<span id="read"></span>
    </div>
    <h3> Messages: <span class="badge"><?= $data['comments']['count']; ?></span></h3>
    <?php if (Session::get('login')) : ?>
        <form method="post" id="comment_form" action="">
            <input type='hidden' id='id_news' value='<?= $data['id_news'] ?>'>
            <div class="form-group">
                    <textarea rows="3" placeholder="Написать комментарий...." name="comment"
                              class="form-control"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-info btn-sm">Добавить коммент
            </button>
            <button type="reset" class="btn btn-info btn-sm">Отмена</button>
        </form>
    <?php else : ?>
        <div style="margin-bottom: 50px;"><a href="/users/login/">Войдите</a>,чтобы оставить комментарий</div>
    <?php endif; ?>

    <?php if ($data['comments']['count']) {
        unset($data['comments']['count']);
        function array_rec($comment, $level = 0)
        {
            static $result;
            foreach ($comment as $item => $value) {
                if ($level == 1) {
                    $result .= "<div class='panel panel-info' style='margin-left: 80px;'>";
                } else {
                    $result .= "<div class='panel panel-info'>";
                }
                $result .= "<div class='panel-heading'>";
                $result .= "<h3 class='panel-title'>";
                $result .= "Написал: <a>{$value['login']}</a>";
                $result .= "Дата\Время: {$value['date_time']} </h3> </div>";
                $result .= "<div class='panel-body'>{$value['comment']}</div>";
                $result .= "<div class='panel-footer' style='padding: 4px 15px; overflow: hidden;'>";
                if (Session::get('login') && $level == 0) {
                    $result .= "<div style='float: left'>";
                    $result .= "<a id='answer'>Ответить</a></div>";
                }
                $result .= "<div style='float: right'>";
                $result .= "<input type='hidden' id='id_comment' value='{$value['id_comment']}'>";
                $result .= "<input type='hidden' id='id_user' value='{$value['id_user']}'>";
                $result .= "<button type='button' id='like' class='btn btn-default btn-xs'>
                        Like:<span class='glyphicon glyphicon-thumbs-up'
                             aria-hidden='true'>{$value['cnt_like']}</span>
                     </button>";
                $result .= "<button type='button' id='dislike' class='btn btn-default btn-xs'>
                        Like:<span class='glyphicon glyphicon-thumbs-down'
                             aria-hidden='true'>{$value['cnt_dislike']}</span>
                     </button>";
                $result .= "</div></div></div>";
                if (isset($value['childs'])) {
//                $result.="</div>";
                    $level++;
                    array_rec($value['childs'], $level);

                    $level = 0;
                } else {
//                $result.= "</div>";
                }
            }
            return $result;
        }

        $comment = array_rec($data['comments']);
        echo $comment;
    }
    ?>
<?php else: ?>
    <div style="min-height: 200px; margin-top: 35px;">
        <h3>Список Новостей:</h3>
        <ul class="list-unstyled">
            <?php foreach ($data['news'] as $key => $value): ?>
                <li><a href="/news/list/<?= $value['id_news']; ?>"><?= $value['title_news']; ?> </a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php if (!isset($_GET['pages'])) $_GET['pages'] = 1; ?>
    <ul class="pagination pagination-sm">
        <?php for ($j = 1; $j <= ($data['news']['count']); $j++) : ?>
            <li <?= ($j == $_GET['pages']) ? 'class=active' : ''; ?>><a
                    href="/news/list/?pages=<?= $j; ?>"><?= $j; ?></a></li>
        <?php endfor; ?>
    </ul>
<?php endif; ?>