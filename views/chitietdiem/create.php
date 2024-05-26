<?php

use yii\helpers\Html;
use kartik\icons\Icon;

/** @var yii\web\View $this */
/** @var app\models\Chitietdiem $model */
/** @var app\models\Monhoc $monhocModel */
/** @var app\models\Hocsinh $hocsinhModel */


$this->title = 'Thêm điểm';
// $this->params['breadcrumbs'][] = ['label' => 'chi tiết điểm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chitietdiem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'monhocModel' => $monhocModel,
        'hocsinhModel' => $hocsinhModel,

    ]) ?>

</div>
