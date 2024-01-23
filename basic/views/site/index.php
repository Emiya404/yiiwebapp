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
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-3 text-center">
			<h2><strong>网站简介</strong></h2>
		</div>
		<p style="font-size:15px;">
			  我们很高兴您对核污染的话题感兴趣。核污染是指由于核能的开发、利用和废弃物的处理而造成的对环境和人类健康的危害。核污染的来源有多种，包括核电站的运行、核试验、核武器的使用、核事故、核废料的处理和运输等。核污染的影响有时是长期的，难以消除的，甚至会影响到后代的基因。
			<br><br>
			  因此，我们需要一个关于核污染的网站，来提高公众的核安全意识，分享核污染的相关新闻，讨论核污染的解决方案，交流核污染的个人经历，以及呼吁核能的和平利用和核裁军的进程。这个网站的主要功能是：
			<br><br>
			<ul>
			<li>查看核污染的相关新闻：您可以在这里浏览最新的核污染的新闻报道，了解核污染的发生地点、原因、程度、影响和应对措施等信息。</li>
			<li>用户发布文章：您可以在这里发表您的观点、见解、建议、感受等，与其他用户交流您对核污染的看法和态度，分享您的知识和经验，或者提出您的疑问和困惑。</li>
			<li>用户发布留言：您可以在这里对其他用户的文章进行评论、回复、点赞、收藏等，表达您的支持、反对、赞同、反驳等，或者与其他用户进行私信沟通。</li>
			<li>这个网站的目的是为了让更多的人关注核污染的问题，增强核安全的意识，促进核能的和平利用，推动核裁军的进程，保护环境和人类的健康。
				我们希望您能加入我们，一起为核污染的防治和消除而努力。谢谢您的关注和支持！</li>
			</ul>
		</p>
	</div>
	<div class="col-md-8">
<div class="row justify-content-center">
        <h2><strong>世界核污染情况动态地图</strong></h2>
</div>
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
    