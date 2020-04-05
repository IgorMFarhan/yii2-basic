<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Laporan;

$this->title = 'Rekap Harian';


$todays =date("d-m-Y");


$reg = 175;
$bdg = 119;
$wbb = 86;
$cbn = 57;
$kwa = 64;
$skb = 57;
$tsm = 57;
$tot = 615;

$today = date('Y-m-d');


$regs = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>1]);
$reg1 = $reg - $regs->count();
$reg2 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>1,'lokasi_id'=>1])->count();
$reg3 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>1,'lokasi_id'=>2])->count();
$reg4 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>1,'lokasi_id'=>3])->count();
$reg5 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>1,'lokasi_id'=>4])->count();
$reg6 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>1,'kondisi_id'=>1])->count();
$reg7 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>1,'kondisi_id'=>2])->count();
$reg8 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>1,'kondisi_id'=>3])->count();

$bdgs = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>2]);
$bdg1 = $bdg - $bdgs->count();
$bdg2 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>2,'lokasi_id'=>1])->count();
$bdg3 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>2,'lokasi_id'=>2])->count();
$bdg4 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>2,'lokasi_id'=>3])->count();
$bdg5 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>2,'lokasi_id'=>4])->count();
$bdg6 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>2,'kondisi_id'=>1])->count();
$bdg7 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>2,'kondisi_id'=>2])->count();
$bdg8 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>2,'kondisi_id'=>3])->count();

$wbbs = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>3]);
$wbb1 = $wbb - $wbbs->count();
$wbb2 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>3,'lokasi_id'=>1])->count();
$wbb3 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>3,'lokasi_id'=>2])->count();
$wbb4 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>3,'lokasi_id'=>3])->count();
$wbb5 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>3,'lokasi_id'=>4])->count();
$wbb6 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>3,'kondisi_id'=>1])->count();
$wbb7 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>3,'kondisi_id'=>2])->count();
$wbb8 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>3,'kondisi_id'=>3])->count();

$cbns = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>4]);
$cbn1 = $cbn - $cbns->count();
$cbn2 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>4,'lokasi_id'=>1])->count();
$cbn3 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>4,'lokasi_id'=>2])->count();
$cbn4 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>4,'lokasi_id'=>3])->count();
$cbn5 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>4,'lokasi_id'=>4])->count();
$cbn6 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>4,'kondisi_id'=>1])->count();
$cbn7 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>4,'kondisi_id'=>2])->count();
$cbn8 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>4,'kondisi_id'=>3])->count();

$kwas = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>5]);
$kwa1 = $kwa - $kwas->count();
$kwa2 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>5,'lokasi_id'=>1])->count();
$kwa3 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>5,'lokasi_id'=>2])->count();
$kwa4 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>5,'lokasi_id'=>3])->count();
$kwa5 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>5,'lokasi_id'=>4])->count();
$kwa6 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>5,'kondisi_id'=>1])->count();
$kwa7 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>5,'kondisi_id'=>2])->count();
$kwa8 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>5,'kondisi_id'=>3])->count();

$skbs = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>6]);
$skb1 = $skb - $skbs->count();
$skb2 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>6,'lokasi_id'=>1])->count();
$skb3 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>6,'lokasi_id'=>2])->count();
$skb4 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>6,'lokasi_id'=>3])->count();
$skb5 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>6,'lokasi_id'=>4])->count();
$skb6 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>6,'kondisi_id'=>1])->count();
$skb7 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>6,'kondisi_id'=>2])->count();
$skb8 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>6,'kondisi_id'=>3])->count();

$tsms = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>7]);
$tsm1 = $tsm - $tsms->count();
$tsm2 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>7,'lokasi_id'=>1])->count();
$tsm3 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>7,'lokasi_id'=>2])->count();
$tsm4 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>7,'lokasi_id'=>3])->count();
$tsm5 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>7,'lokasi_id'=>4])->count();
$tsm6 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>7,'kondisi_id'=>1])->count();
$tsm7 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>7,'kondisi_id'=>2])->count();
$tsm8 = Laporan::find()->where(['like','submit_date',$today])->andWhere(['host_id'=>7,'kondisi_id'=>3])->count();

$tot1 = $reg1+$bdg1+$wbb1+$cbn1+$kwa1+$skb1+$tsm1;
$tot2 = $reg2+$bdg2+$wbb2+$cbn2+$kwa2+$skb2+$tsm2;
$tot3 = $reg3+$bdg3+$wbb3+$cbn3+$kwa3+$skb3+$tsm3;
$tot4 = $reg4+$bdg4+$wbb4+$cbn4+$kwa4+$skb4+$tsm4;
$tot5 = $reg5+$bdg5+$wbb5+$cbn5+$kwa5+$skb5+$tsm5;
$tot6 = $reg6+$bdg6+$wbb6+$cbn6+$kwa6+$skb6+$tsm6;
$tot7 = $reg7+$bdg7+$wbb7+$cbn7+$kwa7+$skb7+$tsm7;
$tot8 = $reg8+$bdg8+$wbb8+$cbn8+$kwa8+$skb8+$tsm8;



?>

<div class="laporan-index " style="margin: 3% 7% 7% 7%">
    <div class="text-center">
        <h2>LAPORAN HARIAN HUMAN RESOURCE TREG III</h2>
        <h4>Tanggal : <?= $todays ?></h4> 
    </div>

    <div class="box box-primary" style="margin-top:20px">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered">
                <tr>
                    <th rowspan="2" style="width: 10px">NO</th>
                    <th rowspan="2">UNIT</th>
                    <th rowspan="2">TOTAL</th>
                    <th rowspan="2" style="width: 100px">BELUM PRESENSI</th>
                    <th colspan="4">LOKASI BEKERJA</th>
                    <th colspan="3">KONDISI KESEHATAN</th>
                </tr>
                <tr>                    
                    <th>WFH</th>
                    <th>WFSO</th>
                    <th>WFO</th>
                    <th>CUTI</th>
                    <th>SAKIT</th>
                    <th style="width: 110px">KURANG FIT</th>
                    <th>SEHAT</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td style="text-align:left">KANTOR REGIONAL III</td>
                    <td><?= $reg ?></td>
                    <td><?= $reg1 ?></td>
                    <td><?= $reg2 ?></td>
                    <td><?= $reg3 ?></td>
                    <td><?= $reg4 ?></td>
                    <td><?= $reg5 ?></td>
                    <td><?= $reg6 ?></td>
                    <td><?= $reg7 ?></td>
                    <td><?= $reg8 ?></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td style="text-align:left">WITEL BANDUNG</td>
                    <td><?= $bdg ?></td>
                    <td><?= $bdg1 ?></td>
                    <td><?= $bdg2 ?></td>
                    <td><?= $bdg3 ?></td>
                    <td><?= $bdg4 ?></td>
                    <td><?= $bdg5 ?></td>
                    <td><?= $bdg6 ?></td>
                    <td><?= $bdg7 ?></td>
                    <td><?= $bdg8 ?></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td style="text-align:left">WITEL BANDUNG BARAT</td>
                    <td><?= $wbb ?></td>
                    <td><?= $wbb1 ?></td>
                    <td><?= $wbb2 ?></td>
                    <td><?= $wbb3 ?></td>
                    <td><?= $wbb4 ?></td>
                    <td><?= $wbb5 ?></td>
                    <td><?= $wbb6 ?></td>
                    <td><?= $wbb7 ?></td>
                    <td><?= $wbb8 ?></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td style="text-align:left">WITEL CIREBON</td>
                    <td><?= $cbn ?></td>
                    <td><?= $cbn1 ?></td>
                    <td><?= $cbn2 ?></td>
                    <td><?= $cbn3 ?></td>
                    <td><?= $cbn4 ?></td>
                    <td><?= $cbn5 ?></td>
                    <td><?= $cbn6 ?></td>
                    <td><?= $cbn7 ?></td>
                    <td><?= $cbn8 ?></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td style="text-align:left">WITEL KARAWANG</td>
                    <td><?= $kwa ?></td>
                    <td><?= $kwa1 ?></td>
                    <td><?= $kwa2 ?></td>
                    <td><?= $kwa3 ?></td>
                    <td><?= $kwa4 ?></td>
                    <td><?= $kwa5 ?></td>
                    <td><?= $kwa6 ?></td>
                    <td><?= $kwa7 ?></td>
                    <td><?= $kwa8 ?></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td style="text-align:left">WITEL SUKABUMI</td>
                    <td><?= $skb ?></td>
                    <td><?= $skb1 ?></td>
                    <td><?= $skb2 ?></td>
                    <td><?= $skb3 ?></td>
                    <td><?= $skb4 ?></td>
                    <td><?= $skb5 ?></td>
                    <td><?= $skb6 ?></td>
                    <td><?= $skb7 ?></td>
                    <td><?= $skb8 ?></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td style="text-align:left">WITEL TASIKMALAYA</td>
                    <td><?= $tsm ?></td>
                    <td><?= $tsm1 ?></td>
                    <td><?= $tsm2 ?></td>
                    <td><?= $tsm3 ?></td>
                    <td><?= $tsm4 ?></td>
                    <td><?= $tsm5 ?></td>
                    <td><?= $tsm6 ?></td>
                    <td><?= $tsm7 ?></td>
                    <td><?= $tsm8 ?></td>
                </tr>
                <tr>                    
                    <th colspan="2">JUMLAH</th>
                    <th><?= $tot ?></th>
                    <th><?= $tot1 ?></th>
                    <th><?= $tot2 ?></th>
                    <th><?= $tot3 ?></th>
                    <th><?= $tot4 ?></th>
                    <th><?= $tot5 ?></th>
                    <th><?= $tot6 ?></th>
                    <th><?= $tot7 ?></th>
                    <th><?= $tot8 ?></th>
                </tr>
                
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
</div>


