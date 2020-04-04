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
<h4><?= Yii::$app->user->identity->nama?></h4>


    <div class="callout callout-warning">
      <h4>Anda belum check-in hari ini</h4>

      <p>Silahkan laporkan kondisi kesehatan Anda dan lokasi bekerja hari ini</p>
    </div>

    <div class="kondisi">
        <h3 class="text-center">Dimana Anda bekerja hari ini?</h3>
        <?php
            $wfh = Html::img('@web/lokasi/wfh.png',['alt'=>'WFH', 'style'=>'width: 172px',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ]],
            );
            echo Html::a($wfh, ['laporan/checklokasi','lokasi'=>1]);

            $wfso = Html::img('@web/lokasi/wfso.png',['alt'=>'WFSO', 'style'=>'width: 172px;']);
            echo Html::a($wfso, ['laporan/checklokasi','lokasi'=>2]);

            $wfo = Html::img('@web/lokasi/wfo.png',['alt'=>'WFO', 'style'=>'width: 172px;']);
            echo Html::a($wfo, ['laporan/checklokasi','lokasi'=>3]);
        ?>
    </div>
</div>

</div>
    </div>

</div>
