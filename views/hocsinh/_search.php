<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\searchs\HocsinhSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="hocsinh-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'hsid') ?>

    <?= $form->field($model, 'tenhs') ?>

    <?= $form->field($model, 'gioitinh') ?>

    <?= $form->field($model, 'ngaysinh') ?>

    <?= $form->field($model, 'sdtbome') ?>

    <?php // echo $form->field($model, 'diachi') ?>

    <?php // echo $form->field($model, 'malop') ?>

    <?php // echo $form->field($model, 'ghichu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
