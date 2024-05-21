<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Hocsinh $model */
/** @var app\models\Lop $lopModel */


$this->title = 'Update Hocsinh: ' . $model->hsid;
$this->params['breadcrumbs'][] = ['label' => 'Học sinh', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->hsid, 'url' => ['view', 'hsid' => $model->hsid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hocsinh-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'lopModel' => $lopModel,
    ]) ?>

</div>
