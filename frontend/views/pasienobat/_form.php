<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Pasien as ModelsPasien;
use frontend\models\Obat as ModelsObat;

/** @var yii\web\View $this */
/** @var frontend\models\Pasienobat $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pasienobat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PasienId')->dropDownList(
    ArrayHelper::map(ModelsPasien::find()->all(), 'id', 'nama'),
    ['prompt' => 'Pilih Pasien'] // Optional, menampilkan teks prompt
); ?>

<?= $form->field($model, 'ObatId')->dropDownList(
    ArrayHelper::map(ModelsObat::find()->all(), 'id', 'nama'),
    ['prompt' => 'Pilih Obat'] // Optional, menampilkan teks prompt
); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
