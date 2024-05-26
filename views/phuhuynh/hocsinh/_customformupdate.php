<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Giaovien $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="hocsinh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gvid')->textInput() ?>

    <?= $form->field($model, 'hotengv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_sinh')->dropDownList([ 'male' => 'Male', 'female' => 'Female', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'diachi')->textInput() ?>

    <?= $form->field($model, 'sdt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mamon')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
