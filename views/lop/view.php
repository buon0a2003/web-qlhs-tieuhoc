<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Lop $model */

$this->title = $model->lopid;
$this->params['breadcrumbs'][] = ['label' => 'Lớp', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lop-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'lopid' => $model->lopid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'lopid' => $model->lopid], [
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
            'lopid',
            'ten_lop',
        ],
    ]) ?>

</div>
