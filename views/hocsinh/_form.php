<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\hocsinh $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\Lop $lopModel */

?>

<div class="hocsinh-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hsid')->textInput() ?>

    <?= $form->field($model, 'tenhs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gioitinh')->dropDownList([ 'male' => 'Nam', 'female' => 'Nữ', ], ['prompt' => 'chọn giới tính']) ?>

    <!-- <?= $form->field($model, 'ngaysinh')->textInput() ?> -->

    <?= $form->field($model, 'ngaysinh')->widget(DatePicker::class, [
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
        'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
        'options' => ['placeholder' => 'Chọn ngày sinh'],
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy/mm/dd',
        ]
    ]);?>

    <?= $form->field($model, 'sdtbome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diachi')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'malop')->textInput() ?> -->
    
    <?= $form->field($model, 'malop')-> dropDownList(\yii\helpers\ArrayHelper::map($lopModel, 'lopid', 'ten_lop'))?>

    <?= $form->field($model, 'ghichu')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
