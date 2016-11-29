<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\SiteAsset;
use app\models\Users;
use app\components\WidgetLeftMenu;
use app\components\WidgetRightMenu;


SiteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php
        $this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1']);
        $this->registerMetaTag(['name' => 'description', 'content' => '']);
        $this->registerMetaTag(['name' => 'keywords', 'content' => '']);
        $this->registerMetaTag(['name' => 'author', 'content' => '']);

        $this->registerLinkTag([
            'title' => '',
            'rel' => 'stylesheet',
            'type' => 'text/css',
            'href' => 'http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700',
        ]);
        $this->registerLinkTag([
            'title' => '',
            'rel' => 'shortcut icon',
            'type' => 'text/css',
            'href' => 'images/favicon.ico',
        ]);
    ?>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- Start SiteHeart code -->
    <!-- Start SiteHeart code -->
    <script>
        (function(){
            var widget_id = 846477;
            _shcp =[{widget_id : widget_id}];
            var lang =(navigator.language || navigator.systemLanguage
            || navigator.userLanguage ||"en")
                .substr(0,2).toLowerCase();
            var url ="widget.siteheart.com/widget/sh/"+ widget_id +"/"+ lang +"/widget.js";
            var hcc = document.createElement("script");
            hcc.type ="text/javascript";
            hcc.async =true;
            hcc.src =("https:"== document.location.protocol ?"https":"http")
                +"://"+ url;
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hcc, s.nextSibling);
        })();
    </script>
    <script type="text/javascript" charset="utf-8" src="http://world-weather.ru/wwinformer.php?userid=2f6d8dcc35212d20cb1e182682e0924b"></script>
    <!-- End SiteHeart code -->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <div class="container">
        <diw class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xm-2"></div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xm-8" id="title_imajes"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xm-2"></div>
        </diw>
    </div>
    <?php
    NavBar::begin([
        'brandLabel' => 'Логотип',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItems = [
        ['label' => 'Регистрация', 'url' => ['/site/auto_reg_gibdd']],
        ['label' => 'Техосмотр', 'url' => ['/site/maps_diagnostik']],
        ['label' => 'Страхование', 'url' => ['/site/strahovka']],
        ['label' => 'Покупка', 'url' => ['/site/pokupka']],
        ['label' => 'Цены', 'url' => ['/site/price']],
        ['label' => 'Контакты', 'url' => ['/site/contact']],
    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <div class="container-fluid" id = "start_">
        <h2 class="text-center">Центр автомобильных услуг</h2>
        <div class="row" id="boss">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 text-center" id = "left">
                    <?= WidgetLeftMenu::widget() ?>
                </div>
                <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12" id="centers">
                    <?= $content ?>
                </div>
                <div class="col-lg-2 col-md-2 col-xs-12 col-sm-12 text-center" id = "right">
                    <?= WidgetRightMenu::widget() ?>
                </div>
            </div>
        </div>
    </div>

</div>
<footer class="footer navbar-fixed-bottom" id="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right">SerGO</p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
