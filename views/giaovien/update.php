<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Giaovien $model */
/** @var app\models\Monhoc $monhocModel */



$this->title = 'Update Giáo viên có mã: ' . $model->gvid;
$this->params['breadcrumbs'][] = ['label' => 'Giáo viên', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->gvid, 'url' => ['view', 'gvid' => $model->gvid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="giaovien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'monhocModel' => $monhocModel,
    ]) ?>

</div>
