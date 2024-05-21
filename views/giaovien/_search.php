<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\searchs\GiaovienSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="giaovien-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'gvid') ?>

    <?= $form->field($model, 'hotengv') ?>

    <?= $form->field($model, 'ngay_sinh') ?>

    <?= $form->field($model, 'diachi') ?>

    <?= $form->field($model, 'sdt') ?>

    <?php // echo $form->field($model, 'mamon') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
