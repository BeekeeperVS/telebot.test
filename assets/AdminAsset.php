<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;
use yii\web\YiiAsset;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot/';
    public $baseUrl = '@web';
    public $publishOptions = ['forceCopy' => true];
    public $css = [
        'https://fonts.googleapis.com/css?family=Montserrat:400,700,200',
        'asset_admin/css/demo.css',
        'asset_admin/css/paper-dashboard.css?v=2.0.0',
        'css/admin.css'
    ];
    public $js = [

        'asset_admin/js/perfect-scrollbar.jquery.min.js',
        'asset_admin/js/paper-dashboard.min.js',
        'asset_admin/js/popper.min.js',
        'asset_admin/js/demo.js',
        'js/parserLink.js'
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
    ];
}
