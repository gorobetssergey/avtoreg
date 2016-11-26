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
<section id="contact">
    <div id="google-map" class="wow fadeIn" data-latitude="52.365629" data-longitude="4.871331" data-wow-duration="1000ms" data-wow-delay="400ms"></div>
    <div id="contact-us" class="parallax">
        <div class="container">
            <div class="row">
                <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <h2>Contact Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
                </div>
            </div>
            <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="row">
                    <div class="col-sm-6">
                        <form id="main-contact-form" name="contact-form" method="post" action="#">
                            <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email Address" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message" required="required"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn-submit">Send Now</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                            <ul class="address">
                                <li><i class="fa fa-map-marker"></i> <span> Address:</span> 2400 South Avenue A </li>
                                <li><i class="fa fa-phone"></i> <span> Phone:</span> +928 336 2000  </li>
                                <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:someone@yoursite.com"> support@oxygen.com</a></li>
                                <li><i class="fa fa-globe"></i> <span> Website:</span> <a href="#">www.sitename.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#contact-->
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
