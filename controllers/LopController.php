<?php

namespace app\controllers;

use app\models\Lop;
use app\models\searchs\LopSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LopController implements the CRUD actions for Lop model.
 */
class LopController extends Controller
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
     * Lists all Lop models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new LopSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lop model.
     * @param int $lopid Lopid
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($lopid)
    {
        return $this->render('view', [
            'model' => $this->findModel($lopid),
        ]);
    }

    /**
     * Creates a new Lop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Lop();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'lopid' => $model->lopid]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Lop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $lopid Lopid
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($lopid)
    {
        $model = $this->findModel($lopid);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'lopid' => $model->lopid]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Lop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $lopid Lopid
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($lopid)
    {
        $this->findModel($lopid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $lopid Lopid
     * @return Lop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($lopid)
    {
        if (($model = Lop::findOne(['lopid' => $lopid])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
