<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\hocsinh $model */

$this->title = $model->tenhs;
$this->params['breadcrumbs'][] = ['label' => 'Học sinh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="hocsinh-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'hsid' => $model->hsid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'hsid' => $model->hsid], [
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
            'hsid',
            'tenhs',
            'gioitinh',
            'ngaysinh',
            'sdtbome',
            'diachi',
            'malop',
            'ghichu',
        ],
    ]) ?>

</div>
