<?php

namespace app\controllers;

use app\models\hocsinh;
use app\models\Giaovien;
use app\models\searchs\HocsinhSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Lop;

/**
 * HocsinhController implements the CRUD actions for hocsinh model.
 */
class HocsinhController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all hocsinh models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new HocsinhSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single hocsinh model.
     * @param int $hsid Hsid
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($hsid)
    {
        return $this->render('view', [
            'model' => $this->findModel($hsid),
        ]);
    }

    /**
     * Creates a new hocsinh model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new hocsinh();
        $lopModel = Lop::find()->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'hsid' => $model->hsid]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'lopModel' => $lopModel,
        ]);
    }

    /**
     * Updates an existing hocsinh model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $hsid Hsid
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($hsid)
    {
        $model = $this->findModel($hsid);
        $lopModel = Lop::find()->all();


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'hsid' => $model->hsid]);
        }

        return $this->render('update', [
            'model' => $model,
            'lopModel' => $lopModel,
        ]);
    }

    /**
     * Deletes an existing hocsinh model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $hsid Hsid
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($hsid)
    {
        $this->findModel($hsid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the hocsinh model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $hsid Hsid
     * @return hocsinh the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($hsid)
    {
        if (($model = Hocsinh::findOne(['hsid' => $hsid])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
