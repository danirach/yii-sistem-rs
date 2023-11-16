<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Pasienobat $model */

$this->title = 'Create Pasienobat';
$this->params['breadcrumbs'][] = ['label' => 'Pasienobats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pasienobat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
