<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="giao-vien-ca-nhan-form">
    <?php $form = ActiveForm::begin(); ?>

        <div class="form-group">
            <label for="mat-khau-cu">Mật khẩu cũ:</label>
            <input type="password" class="form-control" name="mat_khau_cu" id="mat-khau-cu">
        </div>

        <?= $form->field($model, 'password')->passwordInput(['value'=>"", ]) ?>

        <div class="form-group">
            <label for="repeat-mat-khau-moi">Nhắc lại mật khẩu mới:</label>
            <input type="password" class="form-control" name="repeat_mat_khau_moi" id="repeat-mat-khau-moi">
        </div>

        <button type="submit" class="btn btn-primary">Lưu</button>

    <?php ActiveForm::end(); ?>

</div>
