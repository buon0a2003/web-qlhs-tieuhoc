<?php

namespace app\controllers;

use app\models\hocsinh;
use app\models\Giaovien;
use app\models\searchs\ViewHsTongketTbSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Lop;
use app\models\searchs\ThongkeSearch;

class TongketController extends \yii\web\Controller
{
    /**
     * Lists all hocsinh models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ViewHsTongketTbSearch();
        $ThongkeSearch = new ThongkeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $ThongkeData = $ThongkeSearch->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'ThongkeSearch'=> $ThongkeSearch,
            'dataProvider' => $dataProvider,
            'ThongkeData' => $ThongkeData
        ]);
    }

}
