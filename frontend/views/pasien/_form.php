<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Wilayah as ModelsWilayah;

/** @var yii\web\View $this */
/** @var frontend\models\Pasien $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pasien-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wilayah_id')->dropDownList(
    ArrayHelper::map(ModelsWilayah::find()->all(), 'id', 'nama'),
    ['prompt' => 'Pilih Wilayah'] // Optional, menampilkan teks prompt
); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
