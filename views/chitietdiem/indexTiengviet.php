<?php

use app\models\Chitietdiem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\export\ExportMenu;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Chitietdiem $Model */
/** @var app\models\searchs\ViewChitietHsTiengvietSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Chi tiết điểm Tiếng việt';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chitietdiem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm điểm Tiếng việt <i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?=
        ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'hsid'],
                'tenhs',
                [
                    'attribute' => 'ngaysinh',
                    'format' => ['date', 'php:d/m/Y']
                ],
                'diem_giua_ki1',
                'diem_ki1',
                'diem_giua_ki2',
                'diem_ki2',
                'TB',
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

            ['attribute' => 'hsid', 'contentOptions' => ['style' => 'width:3%']],
            'tenhs',
            // 'gioitinh',
            [
                'attribute' => 'ngaysinh',
                'format' => ['date', 'php:d/m/Y']
            ],
            'diem_giua_ki1',
            'diem_ki1',
            'diem_giua_ki2',
            'diem_ki2',
            'TB',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_chitietdiem' => $model->id_chitietdiem]);
                 },'contentOptions' => ['style'=> 'width:6%']
            ],
        ],
    ]); ?>


</div>
