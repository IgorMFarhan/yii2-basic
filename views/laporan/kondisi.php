<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = 'Lapor Kondisi';

$request = Yii::$app->request;
$lokasi = $request->get('lokasi');

?>

<div class="col-lg-6 col-lg-offset-3">
   
    <h3 style="color:red">SEMANGAT PAGI!!!</h3>
    <h4><?= Yii::$app->user->identity->nama .' ('.Yii::$app->user->identity->nik .')' ?></h4>
    <div class="callout callout-warning">

            <h4>Anda belum check-in hari ini</h4>
            <p>Silahkan laporkan kondisi kesehatan Anda dan lokasi bekerja hari ini</p>

    </div>

    <h4 class="text-center">Bagaimana kondisi Anda hari ini?</h4>

    <div class="row " style="padding-top:10px">
        <div class="col-lg-6 col-xs-6">
        <?php
            $sakit = Html::img('@web/kondisi/sakit.png',['alt'=>'sakit','class'=>'img-responsive',]);
            echo Html::a($sakit, ['laporan/checkkondisi','lokasi'=>$lokasi,'kondisi'=>1]);
        ?>
        </div>
        <div class="col-lg-6 col-xs-6">
        <?php
            $kurangfit = Html::img('@web/kondisi/kurangfit.png',['alt'=>'kurangfit','class'=>'img-responsive']);
            echo Html::a($kurangfit, ['laporan/checkkondisi','lokasi'=>$lokasi,'kondisi'=>2]);
        ?>
        </div>
        <div class="col-lg-12 col-xs-12">
        <?php         
            $sehat = Html::img('@web/kondisi/sehat.png',['alt'=>'sehat','class'=>'img-responsive']);
            echo Html::a($sehat, ['laporan/checkkondisi','lokasi'=>$lokasi,'kondisi'=>3]);
        ?>
        </div>
    </div>       
   
</div>

