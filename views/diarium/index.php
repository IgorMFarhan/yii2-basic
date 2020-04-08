<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiariumSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diaria';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="laporan-index " style="margin: 3% 7% 7% 7%">
    <div class="text-center">
        <h2>LAPORAN PRESENSI DIARIUM TREG III</h2>
        
    </div>
    <div class="diarium-index box box-primary" style="margin-top:30px">
        <div class="box-body table-responsive no-padding">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout' => "{items}\n{summary}\n{pager}",
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    [
                        'attribute' => 'nik',
                        'label' => 'Nama Karyawan',
                        'value' => 'nik0.nama',
                        'contentOptions' => ['class' => 'text-left'],
                    ], 
                    [
                        'attribute' => 'unit1',
                        'label' => 'Unit',
                        // 'value' => 'user.nama',
                        'contentOptions' => ['class' => 'text-left'],
                    ], 
                    [
                        'attribute' => 'unit2',
                        'label' => 'Lokasi Kerja',
                        // 'value' => 'user.nama',
                        'contentOptions' => ['class' => 'text-left'],
                    ], 
                    [
                        'attribute' => 'lokasi_id',
                        'label' => 'Lokasi Bekerja',
                        // 'value' => 'user.nama',
                        'contentOptions' => ['class' => 'text-left'],
                    ], 
                    [
                        'attribute' => 'kondisi_id',
                        'label' => 'Kondisi',
                        // 'value' => 'user.nama',
                        'contentOptions' => ['class' => 'text-left'],
                    ], 

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
