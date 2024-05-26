<?php

use app\models\Lop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Hocsinh;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var app\models\searchs\LopSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Danh sách Lớp';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lop-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm lớp <i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?=
        ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'lopid',
                'ten_lop'
            ],
            'dropdownOptions' => [
                'label' => 'Export All',
                'class' => 'btn btn-outline-secondary btn-default'
            ]
        ]);
    ?>
    <div><br></div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => 'max-width:50%;'],
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'lopid',
            'ten_lop',
            [
                'label' => 'Số lượng HS',
                'headerOptions' => ['class' => 'text-success'],
                'value' => function($model){
                    return Hocsinh::find()->where(['malop' => $model->lopid])->count();
                }
            ],
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
