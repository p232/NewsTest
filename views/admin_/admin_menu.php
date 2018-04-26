<ol class="breadcrumb">
    <li><a href="/admin">Home</a></li>
    <li class="active"><a href="/admin/<?=App::getRoutes()->getAction()?>"></a><?=App::getRoutes()->getAction()?></li>
</ol>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="/admin/">Главная</a></li>
                <li><a>Новости <span class="glyphicon glyphicon-chevron-down"></span></a>
                    <ul class="tt nav nav-pills nav-stacked">
                        <li><a href="/admin/news/list/">Список новостей</a></li>
                        <li><a href="/admin/news/add/">Добавить новость</a></li>
                        <li><a href="/admin/news/category/">Список категорий</a></li>
                        <li><a href="/admin/news/tag">Список тегов</a></li>
                    </ul>
                </li>
                <li><a>Комментарии<span class="badge">4</span><span class="glyphicon glyphicon-chevron-down"></span></a>
                    <ul class="tt nav nav-pills nav-stacked">
                        <li><a href="/admin/comments/comments_list/">Список комментариев</a></li>
                    </ul>
                </li>
                <li><a>Рекламные блоки<span class="glyphicon glyphicon-chevron-down"></span></a>
                    <ul class="tt nav nav-pills nav-stacked">
                        <li><a href="/admin/promotions/promotion_list/">Список блоков</a></li>
                        <li><a href="/admin/promotions/promotion_add/">Добавить блок</a></li>
                    </ul>
                </li>
                <li><a>Меню<span class="glyphicon glyphicon-chevron-down"></span></a>
                    <ul class="tt nav nav-pills nav-stacked">
                        <li><a href="/admin/settings/bg_site/">Изменить фон сайта и шапки</a></li>
                    </ul>
                </li>
                <li><a href="/admin/users/user_list/">Юзера</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-md-10">
            <?php include $this->path; ?>
        </div>
    </div>
</div>
