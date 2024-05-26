<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Lop;

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
            [
                'attribute' => 'ngaysinh',
                'format' => ['date', 'php:d/m/Y']
            ],
            'sdtbome',
            'diachi',
            [
                'label' => 'Tên lớp',
                'attribute' => 'malop',
                'value' => function($model){
                    $lop = Lop::findOne(['lopid'=>$model->malop]);
                    return $lop->ten_lop;
                }

            ],
            'ghichu',
        ],
    ]) ?>

</div>
