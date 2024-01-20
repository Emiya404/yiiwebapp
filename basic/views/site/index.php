<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\models\User;
use yii\bootstrap5\Alert;
/** @var yii\web\View $this */
/** @var app\models\Comments $model*/

$this->title = '新闻站首页';

?>

<link href="/backendassets/css/tabler.min.css?1668287865" rel="stylesheet"/>
<link href="/backendassets/css/tabler-flags.min.css?1668287865" rel="stylesheet"/>
<link href="/backendassets/css/tabler-payments.min.css?1668287865" rel="stylesheet"/>
<link href="/backendassets/css/tabler-vendors.min.css?1668287865" rel="stylesheet"/>
<link href="/backendassets/css/demo.min.css?1668287865" rel="stylesheet"/>
<link href="/frontendassets/css/main.css" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
    </style>

<div class="col-md-8">
<div class="row justify-content-center">
        <h2><strong>世界核污染情况动态地图</strong></h2>
</div>
</div>
    <div id="map-world-merc" "></div>
<script src="/backendassets/libs/jsvectormap/dist/js/jsvectormap.min.js?1668287865" defer></script>
<script src="/backendassets/libs/jsvectormap/dist/maps/world.js?1668287865" defer></script>
<script src="/backendassets/libs/jsvectormap/dist/maps/world-merc.js?1668287865" defer></script>

<script src="/backendassets/js/tabler.min.js?1668287865" defer></script>
<script src="/backendassets/js/demo.min.js?1668287865" defer></script>
    <script>
      // @formatter:on
      document.addEventListener("DOMContentLoaded", function() {
      	const map = new jsVectorMap({
      		selector: '#map-world-merc',
      		map: 'world_merc',
      		backgroundColor: 'transparent',
      		regionStyle: {
      			initial: {
      				fill: tabler.getColor('bg-surface'),
      				stroke: tabler.getColor('border-color'),
      				strokeWidth: 2,
      			}
      		},
      		zoomOnScroll: false,
      		zoomButtons: false,
      		// -------- Series --------
      		visualizeData: {
      			scale: [tabler.getColor('bg-surface'), tabler.getColor('danger')],
      			values: { 
                    <?php foreach($pollution_data as $key=>$record):;?>
                        <?= Html::encode($key); ?>:<?= Html::encode($record) ?>,
                    <?php endforeach?>
                },
      		},
      	});
      	window.addEventListener("resize", () => {
      		map.updateSize();
      	});
      });
      // @formatter:off
    </script>
    