<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-index box box-primary">
    <div class="box-header with-border">
        
    </div>
    <div class="box-body table-responsive no-padding">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                
                [
                    'attribute' => 'user_id',
                    'label' => 'Nama Karyawan',
                    'value' => 'nik.nama',
                ], 
                [
                    'attribute' => 'host_id',
                    'label' => 'Lokasi Kerja',
                    'value' => 'host.host_loker',
                ], 
                [
                    'attribute' => 'lokasi_id',
                    'label' => 'Lokasi Bekerja',
                    'value' => 'lokasi.lokasi',
                ], 
                [
                    'attribute' => 'kondisi_id',
                    'label' => 'Kondisi',
                    'value' => 'kondisi.kondisi',
                ],     
            
                'keterangan',
                'submit_date',
            ],
        ]); ?>
    </div>
</div>
