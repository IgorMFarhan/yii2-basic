<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = 'Lapor Loker';

?>

<div class="col-lg-6 col-lg-offset-3">
   
    <h3 style="color:red">SEMANGAT PAGI!!!</h3>
    <h4><?= Yii::$app->user->identity->nama .' ('.Yii::$app->user->identity->nik .')' ?></h4>
    <div class="callout callout-warning">

            <h4>Anda belum check-in hari ini</h4>
            <p>Silahkan laporkan kondisi kesehatan Anda dan lokasi bekerja hari ini</p>

    </div>

    <h4 class="text-center">Dimana Anda bekerja hari ini?</h4>

    <div class="row"  style="padding-top:10px">
        <div class="col-lg-6 col-xs-6">
        <?php
            $wfh = Html::img('@web/lokasi/wfh.png',['alt'=>'WFH','class'=>'img-responsive']);
            echo Html::a($wfh, ['laporan/checklokasi','lokasi'=>1]);
        ?>
        </div>
        <div class="col-lg-6 col-xs-6">
        <?php
            $wfso = Html::img('@web/lokasi/wfso.png',['alt'=>'WFSO','class'=>'img-responsive']);
            echo Html::a($wfso, ['laporan/checklokasi','lokasi'=>2]);
        ?>
        </div>
        <div class="col-lg-6 col-xs-6" style="padding-top:30px">
        <?php         
            $wfo = Html::img('@web/lokasi/wfo.png',['alt'=>'WFO','class'=>'img-responsive']);
            echo Html::a($wfo, ['laporan/checklokasi','lokasi'=>3]);
        ?>
        </div>
        <div class="col-lg-6 col-xs-6" style="padding-top:30px">
        <?php         
            $cuti = Html::img('@web/lokasi/cuti.png',['alt'=>'Cuti','class'=>'img-responsive']);
            echo Html::a($cuti, ['laporan/checklokasi','lokasi'=>4]);
        ?>
        </div>
    </div>       
   
</div>