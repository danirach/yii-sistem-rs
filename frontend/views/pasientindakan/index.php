<?php

use frontend\models\Pasientindakan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Transaksi Tindakan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasientindakan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pasientindakan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [   'attribute' =>'pasien.nama',
                'label' => 'Pasien',
            ],
            [   'attribute' =>'tindakan.nama',
                'label' => 'Tindakan',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pasientindakan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pasienId' => $model->pasienId, 'tindakanId' => $model->tindakanId]);
                 }
            ],
        ],
    ]); ?>


</div>
