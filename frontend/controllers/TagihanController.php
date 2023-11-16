<?php

namespace frontend\controllers;

use frontend\models\Pasienobat;
use frontend\models\Pasientindakan;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use yii\db\Command;

class TagihanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (\Yii::$app->user->can('createpost')) {
        $db = \Yii::$app->db;

        // Membuat perintah SQL
        $sql = 'SELECT * FROM pasien';

        // Mengeksekusi perintah SQL dan mendapatkan hasilnya
        $command = $db->createCommand($sql);
        $result = $command->queryAll();

        // Menggunakan ArrayDataProvider untuk menyediakan data ke GridView
        $dataProvider = new ArrayDataProvider([
            'allModels' => $result,
            'pagination' => false,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

        }else {
            \Yii::$app->getSession()->setFlash('error', 'Silahkan Masuk');
            return $this->redirect(['site/login']);
        }
        
    }
    public function actionCustomView($id)
    {
        $resultTindakan = Pasientindakan::findOne($id);

        $pasien= $resultTindakan->pasien;
        $tindakan= $resultTindakan->tindakan;
        $resultObat = Pasienobat::findOne($id);


        $obat= $resultObat->obat;
        


        // Lakukan sesuatu untuk menangani tindakan custom view
        return $this->render('custom-view', [
            // 'hasilObat' => $resultObat,
            'hasilTindakan' => $resultTindakan,
            'tindakan' => $tindakan,
            'pasien' => $pasien,
            'hasilobat' => $resultObat,
            'obat' => $obat,
        ]);
    }

}
