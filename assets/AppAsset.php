<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

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
        'css/site.css',
        'external-libs/font-awesome/css/font-awesome.css',
        'external-libs/datatables/datatables.min.css',
        'external-libs/bootstrap-chosen/bootstrap-chosen.css',
    ];
    public $js = [
        'external-libs/jquery/jquery.js',
        'external-libs/jquery/jquery-ui.js',
        'external-libs/datatables/datatables.min.js',
        'external-libs/bootstrap-main/js/bootstrap.min.js',
        'external-libs/bootstrap-chosen/chosen.jquery.js',
        'external-libs/typeahead.bundle.js',
        'libs/js/main.js',
        'js/index.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
