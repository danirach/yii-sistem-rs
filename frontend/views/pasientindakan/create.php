<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Pasientindakan $model */

$this->title = 'Create Pasientindakan';
$this->params['breadcrumbs'][] = ['label' => 'Pasientindakans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasientindakan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
