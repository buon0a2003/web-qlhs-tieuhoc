<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Giaovien $model */
/** @var app\models\Monhoc $monhocModel */


$this->title = 'Create Giaovien';
$this->params['breadcrumbs'][] = ['label' => 'Giaoviens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giaovien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'monhocModel' => $monhocModel,
    ]) ?>

</div>
