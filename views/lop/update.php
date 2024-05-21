<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Lop $model */

$this->title = 'Cập nhật Lớp: ';
$this->params['breadcrumbs'][] = ['label' => 'Lớp', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lopid, 'url' => ['view', 'lopid' => $model->lopid]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="lop-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
