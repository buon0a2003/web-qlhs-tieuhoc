<?php

namespace app\controllers;

use app\models\Giaovien;
use app\models\searchs\GiaovienSearch;
use app\models\Monhoc;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use app\models\User;
/**
 * GiaovienController implements the CRUD actions for Giaovien model.
 */
class GiaovienController extends Controller
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
     * Lists all Giaovien models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        $searchModel = new GiaovienSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Giaovien model.
     * @param int $gvid Gvid
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($gvid)
    {
        return $this->render('view', [
            'model' => $this->findModel($gvid),
        ]);
    }

    /**
     * Creates a new Giaovien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Giaovien();
        $monhocModel = Monhoc::find()->all();


        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'gvid' => $model->gvid]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'monhocModel' => $monhocModel,

        ]);
    }

    /**
     * Updates an existing Giaovien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $gvid Gvid
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($gvid)
    {
        $model = $this->findModel($gvid);
        $monhocModel = Monhoc::find()->all();

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'gvid' => $model->gvid]);
        }

        return $this->render('update', [
            'model' => $model,
            'monhocModel' => $monhocModel,
        ]);
    }

    public function actionUpdateMatKhau()
    {
        $model = User::findById(Yii::$app->user->id);
        $password = $model->password;
        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post()) ) {
            $matKhauCu = md5(Yii::$app->request->post('mat_khau_cu'));
            $matKhauMoi = $model->password;
            $repeatMatKhauMoi = Yii::$app->request->post('repeat_mat_khau_moi');
            if ($matKhauCu == $password && $matKhauMoi == $repeatMatKhauMoi) {
                $matKhauMoi = md5($matKhauMoi);
                $model->password = $matKhauMoi;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Cập nhật mật khẩu thành công.');
                    return $this->redirect(['site/index']);
                } else {
                    Yii::$app->session->setFlash('error', 'Đã xảy ra lỗi khi cập nhật mật khẩu.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Mật khẩu cũ không đúng hoặc mật khẩu mới không khớp.');
            }
        }

        return $this->render('@app/views/giaovien/update-mat-khau', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Giaovien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $gvid Gvid
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($gvid)
    {
        $this->findModel($gvid)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Giaovien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $gvid Gvid
     * @return Giaovien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($gvid)
    {
        if (($model = Giaovien::findOne(['gvid' => $gvid])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
