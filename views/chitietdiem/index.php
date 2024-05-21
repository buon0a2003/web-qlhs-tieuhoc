<?php

use app\models\Chitietdiem;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Chitietdiem $Model */
/** @var app\models\searchs\ViewChitietHsTienganhSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Chi tiết điểm Tiếng anh';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chitietdiem-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm điểm anh', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'hsid', 'contentOptions' => ['style' => 'width:3%']],
            'tenhs',
            // 'gioitinh',
            'ngaysinh',
            'diem_giua_ki1',
            'diem_ki1',
            'diem_giua_ki2',
            'diem_ki2',
            'TB',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $Model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_chitietdiem' => $Model->id_chitietdiem]);
                 },'contentOptions' => ['style'=> 'width:6%']
            ],
        ],
    ]); ?>


</div>
