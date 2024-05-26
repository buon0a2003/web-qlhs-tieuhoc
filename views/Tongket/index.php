
<?php

use app\models\hocsinh;
use PhpParser\Node\Stmt\Label;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
// use yii\grid\GridView;
use kartik\grid\GridView;
use app\models\Lop;
use app\models\searchs\ThongkeSearch;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use kartik\export\ExportMenu;
use yii\base\Model;

/** @var yii\web\View $this */
/** @var app\models\searchs\ViewHsTongketTbSearch $searchModel */
/** @var app\models\searchs\ThongkeSearch $ThongkeSearch */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var yii\data\ActiveDataProvider $ThongkeData */

$this->title = 'Danh sách Tổng kết';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hocsinh-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?=
        ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'hsid',
                'tenhs',
                'tienganhTB',
                'tiengvietTB',
                'toanTB',    
                'Tongket',
                'xepLoai'
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
        'rowOptions' => function ($model, $key, $index, $column){
            if ($model->xepLoai == 'Giỏi'){
                return ['class' => 'table-success'];
            }  
            if ($model->xepLoai == 'Khá'){
                return ['class' => 'table-info'];
            }
            if ($model->xepLoai == 'Trung binh'){
                return ['class' => 'table-warning'];
            }
            if ($model->xepLoai == 'Yếu'){
                return ['class' => 'table-danger'];
            }
        },
        'columns' => [
            [   
                'attribute' => 'hsid', 
                'contentOptions' => ['style' => 'width:3%'],
                'headerOptions' => ['class' => 'text-center']

            ],
            [   
                'attribute' => 'tenhs', 
                // 'contentOptions' => ['style' => 'width:3%'],
                'headerOptions' => ['class' => 'text-center']

            ],
            [   
                'attribute' => 'tienganhTB', 
                // 'contentOptions' => ['style' => 'width:3%'],
                'headerOptions' => ['class' => 'text-center']

            ],
            [   
                'attribute' => 'tiengvietTB', 
                // 'contentOptions' => ['style' => 'width:3%'],
                'headerOptions' => ['class' => 'text-center']

            ],
            [   
                'attribute' => 'toanTB', 
                // 'contentOptions' => ['style' => 'width:3%'],
                'headerOptions' => ['class' => 'text-center']

            ],
            [   
                'attribute' => 'Tongket', 
                // 'contentOptions' => ['style' => 'width:3%'],
                'headerOptions' => ['class' => 'text-center']

            ],
            [   
                'attribute' => 'xepLoai', 
                // 'contentOptions' => ['style' => 'width:3%'],
                'headerOptions' => ['class' => 'text-center']

            ],
            // 'tenhs',
            // 'tienganhTB',
            // 'tiengvietTB',
            // 'toanTB',    
            // 'Tongket',
            // 'xepLoai'
        ],
    ]); ?>

    <h1 class="mb-3 mt-5">Thống kê</h1>
    <?=
        ExportMenu::widget([
            'dataProvider' => $ThongkeData,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'xepLoai',
                'soluong',
                [
                    'attribute' => 'tile',
                    'value' => function ($ThongkeData){
                        
                        return $ThongkeData->tile . "%";
                    }
                ]
            ],
            'dropdownOptions' => [
                'label' => 'Export All',
                'class' => 'btn btn-outline-secondary btn-default'
            ]
        ]);
    ?>
    <div><br></div>
    <div class="row">
        <div class="col-7">
            <?= GridView::widget([
                'dataProvider' => $ThongkeData,
                'filterModel' => $ThongkeSearch,
                'moduleId' => 'gridviewKrajee',
                'options' => ['style' => 'max-width:70%;'],
                'columns' => [
                    // 'xepLoai',
                    // 'soluong',
                    // 'tile'
                    [
                        'attribute' => 'xepLoai',
                        // 'contentOptions' => ['style' => 'width: 100px']
                        'headerOptions' => ['class' => 'text-center'],
                    ],
                    [
                        'attribute' => 'soluong',
                        // 'contentOptions' => ['style' => 'width: 100px']
                        'headerOptions' => ['class' => 'text-center'],

                    ],
                    [
                        'attribute' => 'tile',
                        // 'contentOptions' => ['style' => 'width: 100px']
                        'headerOptions' => ['class' => 'text-center'],
                        // 'format' => 'raw',
                        'value' => function ($ThongkeData){
                            
                            return $ThongkeData->tile . "%";
                        }
                    ]
                ],

            ]); ?>
        </div>
        <div class="col-5">
            <?= 
                Highcharts::widget([
                    'options' => [
                        'chart' => [
                            'type' => 'pie',
                            'plotBackgroundColor' => null,
                            'plotBorderWidth' => null,
                            'plotShadow' => false,
                        ],
                        'title' => [
                            'text' => 'Tỉ lệ xếp loại của Học sinh',
                            'style' => [
                                'fontFamily' => 'Arial'
                            ],
                        ],
                        'tooltip' => [
                            'pointFormat' => '{series.name}: <b>{point.percentage:.1f}%</b>',
                            'style' => [
                                'fontFamily' => 'Arial'
                            ],
                        ],
                        'accessibility' => [
                            'point' => [
                                'valueSuffix' => '%',
                            ],
                        ],
                        'style' => [
                            'fontSize' => '55px'
                        ],
                        'plotOptions' => [
                            'pie' => [
                                'allowPointSelect' => true,
                                'cursor' => 'pointer',
                                'dataLabels' => [
                                    'enabled' => true,
                                    'format' => '<b>{point.name}</b>: {point.percentage:.1f} %',
                                ],
                            ],
                        ],
                        'series' => [[
                            'name' => 'Tỉ lệ',
                            'colorByPoint' => true,
                            // 'data' => [
                            //     ['name' => 'Giỏi', 'y' => 63.23],
                            //     ['name' => 'Khá', 'y' => 17.64],
                            //     ['name' => 'Trung bình', 'y' => 8.12],
                            //     ['name' => 'Yếu', 'y' => 5.43],
                            // ],
                            'data' => $chartdata,
                        ]],
                    ],
                ]);
            ?>

        </div>
    </div>

</div>