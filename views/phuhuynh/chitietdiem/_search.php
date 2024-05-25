<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\searchs\ChitietdiemSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="chitietdiem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_chitietdiem') ?>

    <?= $form->field($model, 'mamon') ?>

    <?= $form->field($model, 'mahocsinh') ?>

    <?= $form->field($model, 'diem_giua_ki1') ?>

    <?= $form->field($model, 'diem_ki1') ?>

    <?php // echo $form->field($model, 'diem_giua_ki2') ?>

    <?php // echo $form->field($model, 'diem_ki2') ?>

    <?php // echo $form->field($model, 'ghichu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
