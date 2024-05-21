<?php

use app\models\Hocsinh;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Chitietdiem $model */
/** @var app\models\Monhoc $monhocModel */


// $this->title = 'Update Chitietdiem: ' . $model->id_chitietdiem;
$this->title = 'Cập nhật điểm';
// $this->params['breadcrumbs'][] = ['label' => 'Chitietdiems', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id_chitietdiem, 'url' => ['view', 'id_chitietdiem' => $model->id_chitietdiem]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="chitietdiem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'monhocModel' => $monhocModel,
    ]) ?>

</div>
