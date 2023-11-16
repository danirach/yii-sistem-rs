<?php
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = 'Data Pasien';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-index">
    <h1><?= $this->title ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'nama',
            // ... tambahkan kolom lain sesuai kebutuhan
            [
                'class' => ActionColumn::class,
                'template' => '{custom-view}' ,
                'buttons' => [
                    'custom-view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span> Cek Tagihan', ['custom-view', 'id' => $model['id']]);
                    },
                ],
            ],
        
        ],
        
    ]); ?>
</div>


