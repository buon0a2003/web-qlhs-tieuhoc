<?php

use app\models\Monhoc;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Giaovien $model */

$this->title = $model->hotengv;
$this->params['breadcrumbs'][] = ['label' => 'Giáo viên', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="giaovien-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'gvid' => $model->gvid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'gvid' => $model->gvid], [
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
            'gvid',
            'hotengv',
            [
                'attribute' => 'ngay_sinh',
                'format' => ['date', 'php:d/m/Y'],
            ],
            'diachi',
            'sdt',
            [
                'label' => 'Môn dạy',
                'attribute' => 'mamon',
                'value' => function($model){
                    $mon = Monhoc::findOne(['idmonhoc'=>$model->mamon]);
                    return $mon->tenmon;
                }

            ],
        ],
    ]) ?>

</div>
