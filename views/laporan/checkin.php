<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

$vcenter = <<< CSS
.vcenter {
    display: inline-block;
    vertical-align: middle;
    float: none;
}
CSS;

$this->registerCss($vcenter);


/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = 'Create Laporan';
$this->params['breadcrumbs'][] = ['label' => 'Laporans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-create">

    <div class="col-lg-6 col-lg-offset-3">
    <div class="laporan-form box box-primary">



    
<div class="box-body table-responsive">

<h3 style="color:red">SEMANGAT PAGI!!!</h3>
<h4><?= Yii::$app->user->identity->nama .' ('.Yii::$app->user->identity->nik .')' ?></h4>


    <div class="callout callout-info">
      <h4>Anda sudah check-in hari ini</h4>

      <b>Lokasi Bekerja : </b></br>
      <b>Kondisi Anda : </b></br>
      <b>Waktu Check-in : </b>
    </div>

    <div class="kondisi">
        
        <?php

           echo Html::img('@web/img/infoconona.jpg',['alt'=>'Info Corona', 'class'=>'img-responsive']);
            
        ?>
        <div class="box-footer">
            <?= Html::a('Rekap Harian', ['laporan/checklokasi','id'=>3],['class' => 'btn btn-primary btn-block']) ?>
            <?= Html::a('Keluar', ['/site/logout'],['class' => 'btn btn-danger btn-block','data-method' => 'post']) ?>
        </div>
    </div>
</div>

</div>
    </div>

</div>
