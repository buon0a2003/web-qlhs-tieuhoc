<?php

use app\models\Lop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\searchs\LopSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Danh sách Lớp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lop-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm lớp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => 'max-width:50%;'],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'lopid',
            'ten_lop',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Lop $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'lopid' => $model->lopid]);
                },
                 'contentOptions' => ['style' => 'width: 13%']
            ],
        ],
    ]); ?>


</div>
