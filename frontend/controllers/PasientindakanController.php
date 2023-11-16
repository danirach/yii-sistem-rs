<?php

namespace frontend\controllers;

use frontend\models\Pasientindakan;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PasientindakanController implements the CRUD actions for Pasientindakan model.
 */
class PasientindakanController extends Controller
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
     * Lists all Pasientindakan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->can('createpost')) {
            $dataProvider = new ActiveDataProvider([
                'query' => Pasientindakan::find(),
                /*
                'pagination' => [
                    'pageSize' => 50
                ],
                'sort' => [
                    'defaultOrder' => [
                        'pasienId' => SORT_DESC,
                        'tindakanId' => SORT_DESC,
                    ]
                ],
                */
            ]);
    
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }else {
            \Yii::$app->getSession()->setFlash('error', 'Silahkan Masuk');
            return $this->redirect(['site/login']);
        }
        
    }

    /**
     * Displays a single Pasientindakan model.
     * @param int $pasienId Pasien ID
     * @param int $tindakanId Tindakan ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pasienId, $tindakanId)
    {
        return $this->render('view', [
            'model' => $this->findModel($pasienId, $tindakanId),
        ]);
    }

    /**
     * Creates a new Pasientindakan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pasientindakan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'pasienId' => $model->pasienId, 'tindakanId' => $model->tindakanId]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pasientindakan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pasienId Pasien ID
     * @param int $tindakanId Tindakan ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pasienId, $tindakanId)
    {
        $model = $this->findModel($pasienId, $tindakanId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pasienId' => $model->pasienId, 'tindakanId' => $model->tindakanId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pasientindakan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pasienId Pasien ID
     * @param int $tindakanId Tindakan ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pasienId, $tindakanId)
    {
        $this->findModel($pasienId, $tindakanId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pasientindakan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pasienId Pasien ID
     * @param int $tindakanId Tindakan ID
     * @return Pasientindakan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pasienId, $tindakanId)
    {
        if (($model = Pasientindakan::findOne(['pasienId' => $pasienId, 'tindakanId' => $tindakanId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
