<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Modul4</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/webroot/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <!-- arcticModal -->
    <script src="/webroot/js/articmodal_v0.3/jquery.arcticmodal-0.3.min.js"></script>
    <link rel="stylesheet" href="/webroot/js/articmodal_v0.3/jquery.arcticmodal-0.3.css">
    <!-- arcticModal theme -->
    <link rel="stylesheet" href="/webroot/js/articmodal_v0.3/themes/dark.css">
    <script src="/webroot/js/articmodal_v0.3/jquery.cookie.js"></script>
</head>
<body style="background-color:<?= $data['config'][1]['value']; ?>">

<div style="display: none;">
    <div class="box-modal" id="boxUserFirstInfo">
        <div class="box-modal_close arcticmodal-close">закрыть</div>
        <h1>Подписаться?</h1>
        <form>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <button class="arcticmodal-close btn btn-default">Подписаться</button>
        </form>
    </div>
</div>

<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:<?= $data['config'][0]['value'] ?>">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Project name</a>
    </div>
    <ul id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><a class="active" href="/category/list">Категории новостей</a></li>
            <li><a href="/news/list/">Список новостей</a></li>
            <li><a href="/find/">Поиск</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php if (Session::get('login')): ?>
                <li><a href="/">Hello <?= Session::get('login'); ?></a></li>
                <li><a href="/users/logout/">Logout</a></li>
            <?php else : ?>
                <li><a href="/users/register/">Register</a></li>
                <li><a href="/users/login/">login</a></li>
            <?php endif; ?>
        </ul>
        <form action="search.php" method="post" name="form" onsubmit="return false;"
              class="navbar-form navbar-right" role="search">
            <div class="form-group">
                <div class="btn-group">
                    <input type="text" autocomplete="off" id="search" data-toggle="dropdown" class="form-control"
                           placeholder="search by tags"> </input>
                    <ul id="resSearch" class="dropdown-menu">
                    </ul>
                </div>
            </div>
        </form>
</nav>
<br>
<?php if (App::getRoutes()->getMethodPrefix() == null): ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <?php for ($prom = $data['promotion'], $cnt = count($data['promotion']), $i = 0;
                $i < $cnt;
                $i++): ?>
                <?php if ($i == ceil($cnt / 2)) : ?>
            </div>
            <div class="col-sm-2 col-sm-push-8">
                <?php endif; ?>
                <div class="banner" data-placement="right" data-toggle="tooltip"
                     title="Купон на скидку-.........-Примените и получите 10% скидки">
                    <p>Price : <span><?= $prom[$i]['price'] ?></span> грн.</p>
                    <p id="<?= $prom[$i]['id'] ?>">
                        <a href="<?= $prom[$i]['site'] ?>"><?= $prom[$i]['firm'] ?> <?= $prom[$i]['product_name'] ?></a>
                    </p>
                </div>
                <?php endfor; ?>
            </div>
            <div class="col-sm-8 col-sm-pull-2">
                <?php if (Session::hasFlash()) { ?>
                    <div class="starter-template">
                        <div class="alert alert-info" role="alert">
                            <?php Session::flash(); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php include $this->path; ?>
            </div>
        </div>
    </div>
<?php elseif (Session::get('login') == 'admin'): ?>
    <?php include VIEW_PATH . DS . App::getRoutes()->getMethodPrefix() . DS . 'admin_menu.php'; ?>
<?php else : ?>
    <div class="container">
    <?php include $this->path; ?>
    </div>
<?php endif; ?>
<?php include VIEW_PATH . DS . 'footer.php'; ?>
</body>
<script src="/webroot/js/main.js"></script>
</html>
