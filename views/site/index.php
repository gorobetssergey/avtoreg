<?php

use yii\helpers\Url;
?>

<section id="services">
    <div class="container">
        <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="row">
                <div class="text-center col-sm-8 col-sm-offset-2">
                    <h2>Наши услуги</h2>
                    <p>Наша компания предоставляет Вам полный спектр услуг связанных с движимым имуществом</p>
                </div>
            </div>
        </div>
        <div class="text-center our-services">
            <div class="row">
                <a href="<?=Url::to('site/auto_reg_gibdd')?>" class="start_title_link">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInDown start_title" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <div class="service-icon">
                            <i class="fa fa-flask"></i>
                        </div>
                        <div class="service-info">
                            <h3>Регистрация автомобиля в ГИБДД</h3>
                            <p>Для того, что бы пройти Регистрацию автомобиля в ГИБДД нужно:</p>
                        </div>
                    </div>
                </a>
                <a href="<?=Url::to('site/maps_diagnostik')?>" class="start_title_link">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInDown start_title" data-wow-duration="1000ms" data-wow-delay="450ms">
                        <div class="service-icon">
                            <i class="fa fa-umbrella"></i>
                        </div>
                        <div class="service-info">
                            <h3>Техосмотр. Диагностическая карта</h3>
                            <p>Диагностическая карта техосмотра — документ, оформленный по результатам.. </p>
                        </div>
                    </div>
                </a>
                <a href="<?=Url::to('site/strahovka')?>" class="start_title_link">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInDown start_title" data-wow-duration="1000ms" data-wow-delay="550ms">
                        <div class="service-icon">
                            <i class="fa fa-cloud"></i>
                        </div>
                        <div class="service-info">
                            <h3>Автострахование</h3>
                            <p>По закону, все лица в независимости от национальности, перебивающие на территории..</p>
                        </div>
                    </div>
                </a>
                <a href="<?=Url::to('site/pokupka')?>" class="start_title_link">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInUp start_title" data-wow-duration="1000ms" data-wow-delay="650ms">
                        <div class="service-icon">
                            <i class="fa fa-coffee"></i>
                        </div>
                        <div class="service-info">
                            <h3>Покупка - продажа авто</h3>
                            <p>Помощь при оформлении договора купли-продажи автомобиля</p>
                        </div>
                    </div>
                </a>
                <a href="<?=Url::to('site/price')?>" class="start_title_link">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInUp start_title" data-wow-duration="1000ms" data-wow-delay="750ms">
                        <div class="service-icon">
                            <i class="fa fa-bitbucket"></i>
                        </div>
                        <div class="service-info">
                            <h3>Цены</h3>
                            <p>Цены на наши услуги:</p>
                        </div>
                    </div>
                </a>
                <a href="<?=Url::to('site/contact')?>" class="start_title_link">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 wow fadeInUp start_title" data-wow-duration="1000ms" data-wow-delay="850ms">
                        <div class="service-icon">
                            <i class="fa fa-gift"></i>
                        </div>
                        <div class="service-info">
                            <h3>Контакты</h3>
                            <p>Ниши контакты:</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section><!--/#services-->