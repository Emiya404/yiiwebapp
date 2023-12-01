<?php 
/*
    developed by WanZesheng 10.28, a new layout for the backend console
    the layout content is in /view/layout/backend.php
    the statics, css and js are in the /web/backendstatic and /web/backendassets
*/
?>
<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BackendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/backendassets/';
    public $css = [

    ];
    public $js = [

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
