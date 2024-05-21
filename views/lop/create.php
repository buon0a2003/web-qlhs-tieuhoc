<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Lop $model */

$this->title = 'Thêm lớp';
$this->params['breadcrumbs'][] = ['label' => 'Lớp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
