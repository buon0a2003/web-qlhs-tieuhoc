<?php

use app\models\Giaovien;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var app\models\searchs\GiaovienSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Danh sách giáo viên';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giaovien-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm giáo viên <i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?=
        ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'gvid',
                ],
                'hotengv',
                [
                    'attribute' => 'ngay_sinh',
                    'format' => ['date', 'php:d/m/Y'],
                ],
                'diachi',
                'sdt',
                [
                    'attribute'=> 'mamon',
                    'value' => 'monhoc.tenmon'
                ],
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
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'gvid',
                'contentOptions' => ['style' => 'width:1%']
            ],
            'hotengv',
            [
                'attribute' => 'ngay_sinh',
                'format' => ['date', 'php:d/m/Y'],
            ],
            'diachi',
            'sdt',
            // 'mamon',
            [
                'attribute'=> 'mamon',
                'value' => 'monhoc.tenmon'
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Giaovien $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'gvid' => $model->gvid]);
                 },
                 'contentOptions' => ['style' => 'width: 6%']
                 
            ],
        ],
    ]); ?>


</div>
