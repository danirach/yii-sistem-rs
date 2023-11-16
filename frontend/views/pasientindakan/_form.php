<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Pasien as ModelsPasien;
use frontend\models\Tindakan as ModelsTindakan;

/** @var yii\web\View $this */
/** @var frontend\models\Pasientindakan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pasientindakan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pasienId')->dropDownList(
    ArrayHelper::map(ModelsPasien::find()->all(), 'id', 'nama'),
    ['prompt' => 'Pilih Pasien'] // Optional, menampilkan teks prompt
); ?>

<?= $form->field($model, 'tindakanId')->dropDownList(
    ArrayHelper::map(ModelsTindakan::find()->all(), 'id', 'nama'),
    ['prompt' => 'Pilih Tindakan'] // Optional, menampilkan teks prompt
); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
