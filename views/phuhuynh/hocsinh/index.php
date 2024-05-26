<?php

use app\models\hocsinh;
use PhpParser\Node\Stmt\Label;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Lop;

/** @var yii\web\View $this */
/** @var app\models\searchs\HocsinhSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Danh sách học sinh';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hocsinh-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?= Html::a('Thêm học sinh', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            [   
                'attribute' => 'hsid', 
                'contentOptions' => ['style' => 'width:3%']
            ],

            'tenhs',
            
            [
                'attribute' => 'gioitinh', 
                'contentOptions' => ['style' => 'width:1%'],
                'value' => function($dataProvider){
                    if ($dataProvider->gioitinh == 'male')
                        return 'Nam';
                    else
                        return 'Nữ';
                }
            ],

            [
                'attribute' => 'ngaysinh',
                'format' => ['date', 'php:d/m/Y']
            ],

            'sdtbome',
            'diachi',
            // 'malop',
            [
                'label' => 'Tên lớp',
                'attribute' => 'malop',
                'value' => function($model){
                    $lop = Lop::findOne(['lopid'=>$model->malop]);
                    return $lop->ten_lop;
                }

            ],
            'ghichu',
            // [
            //     'class' => ActionColumn::class,
            //     'urlCreator' => function ($action, hocsinh $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'hsid' => $model->hsid]);
            //      },'contentOptions' => ['style'=> 'width:6%']
            // ],

        ],
    ]); ?>


</div>