<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\hocsinh $model */
/** @var app\models\Lop $lopModel */


$this->title = 'Create Hocsinh';
$this->params['breadcrumbs'][] = ['label' => 'Học sinh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hocsinh-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'lopModel' => $lopModel,
    ]) ?>

</div>
