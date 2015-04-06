<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'tools/plugins/panels/panels.css',
        'tools/forms/css/forms.css',
        'skin/default_skin/css/theme.css'
    ];
    public $js = [
        'vendor/jquery/jquery-1.11.1.min.js',
        'vendor/jquery/jquery_ui/jquery-ui.min.js',
        'js/bootstrap/bootstrap.min.js',
        'js/pages/login/EasePack.min.js',
        'js/pages/login/rAF.js',
        'js/pages/login/TweenLite.min.js',
        'js/pages/login/login.js',
        'js/utility/utility.js',
        'vendor/plugins/highcharts/highcharts.js',
        'vendor/plugins/circles/circles.js',
        'vendor/plugins/raphael/raphael.js',
        'js/bootstrap/holder.min.js',
        'tools/plugins/panels/json2.js',
        'tools/plugins/panels/jquery.ui.touch-punch.min.js',
        'tools/plugins/panels/adminpanels.js',
        'js/pages/widgets.js',
        'js/main.js',
        'js/demo.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
