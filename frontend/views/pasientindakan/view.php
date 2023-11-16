<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var frontend\models\Pasientindakan $model */

$this->title = $model->pasienId;
$this->params['breadcrumbs'][] = ['label' => 'Pasientindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pasientindakan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pasienId' => $model->pasienId, 'tindakanId' => $model->tindakanId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pasienId' => $model->pasienId, 'tindakanId' => $model->tindakanId], [
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
            'pasienId',
            'tindakanId',
        ],
    ]) ?>

</div>
