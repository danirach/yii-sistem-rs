<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Pasienobat $model */

$this->title = 'Update Pasienobat: ' . $model->PasienId;
$this->params['breadcrumbs'][] = ['label' => 'Pasienobats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->PasienId, 'url' => ['view', 'PasienId' => $model->PasienId, 'ObatId' => $model->ObatId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pasienobat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
