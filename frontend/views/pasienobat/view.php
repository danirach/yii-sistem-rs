<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Pasienobat $model */

$this->title = $model->PasienId;
$this->params['breadcrumbs'][] = ['label' => 'Pasienobats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pasienobat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'PasienId' => $model->PasienId, 'ObatId' => $model->ObatId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'PasienId' => $model->PasienId, 'ObatId' => $model->ObatId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PasienId',
            'ObatId',
        ],
    ]) ?>

</div>
