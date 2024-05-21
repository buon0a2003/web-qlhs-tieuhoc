<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Giaovien $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\Monhoc $monhocModel */

?>

<div class="giaovien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hotengv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_sinh')->textInput() ?>

    <?= $form->field($model, 'diachi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sdt')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'mamon')->textInput() ?> -->

    <?= $form->field($model, 'mamon')->dropDownList(\yii\helpers\ArrayHelper::map($monhocModel, 'idmonhoc', 'tenmon')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
