<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Pasientindakan $model */

$this->title = 'Update Pasientindakan: ' . $model->pasienId;
$this->params['breadcrumbs'][] = ['label' => 'Pasientindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pasienId, 'url' => ['view', 'pasienId' => $model->pasienId, 'tindakanId' => $model->tindakanId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pasientindakan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
