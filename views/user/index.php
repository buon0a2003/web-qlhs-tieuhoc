<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
// use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var app\models\searchs\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tài khoản người dùng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Thêm tài khoản <i class="fas fa-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
        ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'user_id',
                'username',
                [
                    'attribute' => 'role_id',
                    'value' => 'role.tenrole'
                ],
            ],
            'dropdownOptions' => [
                'label' => 'Export All',
                'class' => 'btn btn-outline-secondary btn-default'
            ]
            ]);
    ?>
    <div><br></div>
    <?= 
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'moduleId' => 'gridviewKrajee',
        'options' => ['style' => 'max-width:60%;'],

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_id',
            'username',
            // 'password',
            // 'role_id',
            [
                'attribute' => 'role_id',
                'value' => 'role.tenrole'
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'user_id' => $model->user_id]);
                }
            ],   
        ]
    ]); ?>


</div>
