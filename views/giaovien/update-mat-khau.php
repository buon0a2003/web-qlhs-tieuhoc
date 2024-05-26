<?php


use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\User $model */

$this->title = 'Đổi mật khẩu';
$this->params['breadcrumbs'][] = ['label' => 'Đổi mật khẩu'];


?>
<div class="giao-vien-ca-nhan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-mat-khau', [
        'model' => $model,
    ]) ?>

</div>
