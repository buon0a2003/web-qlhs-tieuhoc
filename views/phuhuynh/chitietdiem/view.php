<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Chitietdiem $model */

$this->title = $model->id_chitietdiem;
// $this->params['breadcrumbs'][] = ['label' => 'Chitietdiems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="chitietdiem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_chitietdiem' => $model->id_chitietdiem], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_chitietdiem' => $model->id_chitietdiem], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_chitietdiem',
            'mamon',
            'mahocsinh',
            'diem_giua_ki1',
            'diem_ki1',
            'diem_giua_ki2',
            'diem_ki2',
            // 'ghichu',
        ],
    ]) ?>

</div>
