<?php

namespace frontend\controllers;

use frontend\models\Pasienobat;
use frontend\models\PasienobatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PasienobatController implements the CRUD actions for Pasienobat model.
 */
class PasienobatController extends Controller
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
     * Lists all Pasienobat models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('createpost')) {
            
            $searchModel = new PasienobatSearch();
            $dataProvider = $searchModel->search($this->request->queryParams);
    
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
            }else {
                \Yii::$app->getSession()->setFlash('error', 'Silahkan Masuk');
                return $this->redirect(['site/login']);
            }
    }

    /**
     * Displays a single Pasienobat model.
     * @param int $PasienId Pasien ID
     * @param int $ObatId Obat ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($PasienId, $ObatId)
    {
        return $this->render('view', [
            'model' => $this->findModel($PasienId, $ObatId),
        ]);
    }

    /**
     * Creates a new Pasienobat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pasienobat();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'PasienId' => $model->PasienId, 'ObatId' => $model->ObatId]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pasienobat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $PasienId Pasien ID
     * @param int $ObatId Obat ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($PasienId, $ObatId)
    {
        $model = $this->findModel($PasienId, $ObatId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'PasienId' => $model->PasienId, 'ObatId' => $model->ObatId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pasienobat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $PasienId Pasien ID
     * @param int $ObatId Obat ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($PasienId, $ObatId)
    {
        $this->findModel($PasienId, $ObatId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pasienobat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $PasienId Pasien ID
     * @param int $ObatId Obat ID
     * @return Pasienobat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($PasienId, $ObatId)
    {
        if (($model = Pasienobat::findOne(['PasienId' => $PasienId, 'ObatId' => $ObatId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
