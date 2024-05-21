<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Chitietdiem $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\Monhoc $monhocModel */

?>



<div class="chitietdiem-form">
    
    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'mamon')->textInput() ?> -->
    <?= $form->field($model, 'mamon')->dropDownList(yii\helpers\ArrayHelper::map($monhocModel, 'idmonhoc', 'tenmon')) ?>

    <?= $form->field($model, 'mahocsinh')->textInput(['readonly' => false]) ?>

    <?= $form->field($model, 'diem_giua_ki1')->textInput() ?>

    <?= $form->field($model, 'diem_ki1')->textInput() ?>

    <?= $form->field($model, 'diem_giua_ki2')->textInput() ?>

    <?= $form->field($model, 'diem_ki2')->textInput() ?>

    <?= $form->field($model, 'ghichu')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
