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
    <h1>
        <?php echo $pasien->nama?>
    </h1>

   
    <p>
        <?php echo $tindakan->nama;?>
        <?php echo $tindakan->harga;?>
    </p>
    <p>
        <?php echo $obat->nama;?>

        <?php echo $obat->harga;?>
    </p>
    <p>
        Total
    </p>
    <p>
    <?php echo $tindakan->harga +$obat->harga; ?> 
    </p>
    

<a href="/tagihan" class="btn btn-primary">Kembali</a>
</div>


