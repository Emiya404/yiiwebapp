<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bookmark $model */

$this->title = 'Create Bookmark';
$this->params['breadcrumbs'][] = ['label' => 'Bookmarks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookmark-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
