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
        'css/news.css',
        'css/jquery.bxslider.css',
        
    ];
    public $js = [
    	
    	'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js',
    	'//yandex.st/jquery/cookie/1.0/jquery.cookie.min.js',
    	'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
    	'js/news.js',
    	'js/script.js',
    	'js/index.js',
    	'js/jquery.bxslider.min.js',
    	
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
