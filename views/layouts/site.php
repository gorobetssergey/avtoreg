<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\SiteAsset;
use app\models\Users;


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
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <!--.preloader-->
    <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
    <!--/.preloader-->
    <?php
    NavBar::begin([
        'brandLabel' => 'Boards',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItems = [
//        ['label' => 'Home', 'url' => ['/site/index']],
//        ['label' => 'About', 'url' => ['/site/about']],
//        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if(Yii::$app->user->isGuest):
        $menuItems[]=[
            'label' => 'Войти',
            'url' => ['/site/login']
        ];
        $menuItems[]=[
            'label' => 'Регистрация',
            'url' => ['/site/reg']
        ];
    else:
        if(Yii::$app->user->identity->role==Users::ROLE_USER):
            $menuItems[] = [
                'label' => 'Кабинет', 'url' => ['/cabinet/index'],
            ];
        elseif(Yii::$app->user->identity->role==Users::ROLE_ADMIN):
            $menuItems[] = [
                'label' => 'Админка', 'url' => ['/admin/index'],
            ];
        endif;
        $menuItems[]=[
            'label' => 'Выйти (' . Yii::$app->user->identity->email . ')',
            'url' => ['/site/logout'],
            'linkOptions' => [
                'data-method' => 'post'
            ]
        ];
    endif;

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= $content ?>
    </div>

</div>
<footer class="footer" id="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<!--<footer id="footer">-->
<!--    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">-->
<!--        <div class="container text-center">-->
<!--            <div class="footer-logo">-->
                <a href="<?=\yii\helpers\Url::to(Yii::$app->homeUrl)?>"><img class="img-responsive" src="/images/logo.png" alt=""></a>
<!--            </div>-->
<!--            <div class="social-icons">-->
<!--                <ul>-->
<!--                    <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>-->
<!--                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--                    <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>-->
<!--                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>-->
<!--                    <li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="footer-bottom">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-sm-6">-->
<!--                    <p>&copy; 2014 Oxygen Theme.</p>-->
<!--                </div>-->
<!--                <div class="col-sm-6">-->
<!--                    <p class="pull-right">Designed by <a href="http://www.themeum.com/">Themeum</a></p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
