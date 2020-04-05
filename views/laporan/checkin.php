<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = 'Check-In';
$this->params['breadcrumbs'][] = ['label' => 'Laporans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="col-lg-6 col-lg-offset-3">
 
    <h3 style="color:red">SEMANGAT PAGI!!!</h3>
    <h4><?= Yii::$app->user->identity->nama .' ('.Yii::$app->user->identity->nik .')' ?></h4>


    <div class="callout callout-info">
      <h4>Anda sudah check-in hari ini</h4>

      <b>Lokasi Bekerja : <?= $model->lokasi->lokasi ?></b></br>
      <b>Kondisi Anda : <?= $model->kondisi->kondisi ?></b></br>
      <b>Waktu Check-in : <?= $model->submit_date ?> </b>
    </div>

    <div class="kondisi">
        
        <?php

           echo Html::img('@web/img/infoconona.jpg',['alt'=>'Info Corona', 'class'=>'img-responsive']);
            
        ?>
        <div class="box-footer">
            <?= Html::a('Rekap Harian', ['rekap'],['class' => 'btn btn-primary btn-block']) ?>
            <?= Html::a('Keluar', ['/site/logout'],['class' => 'btn btn-danger btn-block','data-method' => 'post']) ?>
        </div>
    </div>
</div>


