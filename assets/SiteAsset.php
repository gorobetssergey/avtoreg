<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SiteAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/site/bootstrap.min.css',
        'css/site/animate.min.css',
        'css/site/font-awesome.min.css',
        'css/site/lightbox.css',
        'css/site/main.css',
        ['css/site/presets/preset1.css','id' => 'css-preset'],
        'css/site/responsive.css',

    ];
    public $js = [
        ['js/site/html5shiv.js','position' => \yii\web\View::POS_HEAD],
        ['js/site/respond.min.js','position' => \yii\web\View::POS_HEAD],
        'js/site/jquery.js',
        'js/site/bootstrap.min.js',
        'js/site/jquery.inview.min.js',
        'js/site/wow.min.js',
        'js/site/mousescroll.js',
        'js/site/smoothscroll.js',
        'js/site/jquery.countTo.js',
        'js/site/lightbox.min.js',
        'js/site/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public function init()
    {
        parent::init();
    }
}