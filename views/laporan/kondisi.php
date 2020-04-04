<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Alert;

$request = Yii::$app->request;
$lokasi = $request->get('lokasi');


/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = 'Lapor Kondisi';
$this->params['breadcrumbs'][] = ['label' => 'Laporans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-create">

    <div class="col-lg-6 col-lg-offset-3">
    <div class="laporan-form box box-primary">



    
<div class="box-body table-responsive">

<h3 style="color:red">SEMANGAT PAGI!!!</h3>
<h4><?= Yii::$app->user->identity->nama .' ('.Yii::$app->user->identity->nik .')' ?></h4>


    <div class="callout callout-warning">
      <h4>Anda belum check-in hari ini</h4>

      <p>Silahkan laporkan kondisi kesehatan Anda dan lokasi bekerja hari ini</p>
    </div>

    <div class="kondisi">
        <h3 class="text-center">Bagaimana kondisi Anda hari ini?</h3>
        <?php
            $sakit = Html::img('@web/kondisi/sakit.png',['alt'=>'sakit', 'style'=>'width: 172px',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ]],
            );
            echo Html::a($sakit, ['laporan/checkkondisi','lokasi'=>$lokasi,'kondisi'=>1]);

            $kurangfit = Html::img('@web/kondisi/kurangfit.png',['alt'=>'kurangfit', 'style'=>'width: 172px;']);
            echo Html::a($kurangfit, ['laporan/checkkondisi','lokasi'=>$lokasi,'kondisi'=>2]);

            $sehat = Html::img('@web/kondisi/sehat.png',['alt'=>'sehat', 'style'=>'width: 172px;']);
            echo Html::a($sehat, ['laporan/checkkondisi','lokasi'=>$lokasi,'kondisi'=>3]);
        ?>
    </div>
</div>

</div>
    </div>

</div>
