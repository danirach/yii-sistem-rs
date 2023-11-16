<?php

use frontend\models\Pasienobat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var frontend\models\PasienobatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Transaksi Obat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasienobat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pasienobat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [   'attribute' =>'pasien.nama',
                'label' => 'Pasien',
            ],
            [   'attribute' =>'obat.nama',
                'label' => 'Obat',
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Pasienobat $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'PasienId' => $model->PasienId, 'ObatId' => $model->ObatId]);
                 }
            ],
        ],
    ]); ?>


</div>
