<?php

namespace app\controllers;

use app\models\Chitietdiem;
use app\models\searchs\ChitietdiemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\searchs\ViewChitietHsTienganhSearch;
use app\models\searchs\ViewChitietHsTiengvietSearch;
use app\models\searchs\ViewChitietHsToanSearch;
use app\models\Hocsinh;
use app\models\searchs\HocsinhSearch;
use app\models\searchs\MonhocSearch;
use app\models\User;
use yii;

/**
 * ChitietdiemController implements the CRUD actions for Chitietdiem model.
 */
class ChitietdiemController extends Controller
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
     * Lists all Chitietdiem models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $searchModel = new ViewChitietHsTienganhSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if (User::findIdentity(Yii::$app->user->id)->role_id == 3){
            return $this->render('@app/views/phuhuynh/chitietdiem/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('@app/views/chitietdiem/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    

    public function actionIndexTiengviet(){
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $searchModel = new ViewChitietHsTiengvietSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if (User::findIdentity(Yii::$app->user->id)->role_id == 3){
            return $this->render('@app/views/phuhuynh/chitietdiem/indexTiengviet', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('@app/views/chitietdiem/indexTiengviet', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionIndexToan(){
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        $searchModel = new ViewChitietHsToanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if (User::findIdentity(Yii::$app->user->id)->role_id == 3){
            return $this->render('@app/views/phuhuynh/chitietdiem/indexToan', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('@app/views/chitietdiem/indexToan', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Chitietdiem model.
     * @param int $id_chitietdiem Id Chitietdiem
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_chitietdiem)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_chitietdiem),
        ]);
    }

    /**
     * Creates a new Chitietdiem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Chitietdiem();
        $monhocModel = MonhocSearch::find()->all();
        $hocsinhModel = HocsinhSearch::find()->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_chitietdiem' => $model->id_chitietdiem]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'monhocModel' => $monhocModel,
            'hocsinhModel' => $hocsinhModel,
        ]);
    }

    public function actionCreateTiengviet()
    {
        $model = new Chitietdiem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_chitietdiem' => $model->id_chitietdiem]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('createTiengviet', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Chitietdiem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_chitietdiem Id Chitietdiem
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_chitietdiem)
    {
        $model = $this->findModel($id_chitietdiem);
        $monhocModel = MonhocSearch::find()->all();


        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_chitietdiem' => $model->id_chitietdiem]);
        }

        return $this->render('update', [
            'model' => $model,
         'monhocModel' => $monhocModel,
        ]);
    }

    /**
     * Deletes an existing Chitietdiem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_chitietdiem Id Chitietdiem
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_chitietdiem)
    {
        $this->findModel($id_chitietdiem)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Chitietdiem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_chitietdiem Id Chitietdiem
     * @return Chitietdiem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_chitietdiem)
    {
        if (($model = Chitietdiem::findOne(['id_chitietdiem' => $id_chitietdiem])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
