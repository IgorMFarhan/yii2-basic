<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $searchModel app\models\LaporanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="laporan-index " style="margin: 3% 7% 7% 7%">
    <div class="text-center">
        <h2>LAPORAN PRESENSI HUMAN RESOURCE TREG III</h2>
        
    </div>

    <div class="box box-primary" style="margin-top:30px">
            <!-- /.box-header -->
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
                    'value' => 'user.nama',
                    'contentOptions' => ['class' => 'text-left'],
                ], 
                [
                    'class' => 'yii\grid\DataColumn',
                    'attribute' => 'unit2_id',
                    'label' => 'Unit',
                    'value' => 'unit2.unit2',
                    'contentOptions' => ['class' => 'text-left'],
                    'filter' => Html::activeDropDownList($searchModel, 'unit2_id', $unit2,
                    ['class'=>'form-control','prompt' => ''])
                ], 
                [
                    'attribute' => 'lokasi_id',
                    'label' => 'Lokasi Bekerja',
                    'value' => 'lokasi.lokasi',
                    'filter' => Html::activeDropDownList($searchModel, 'lokasi_id', $lokasi,
                    ['class'=>'form-control','prompt' => ''])
                ], 
                [
                    'attribute' => 'kondisi_id',
                    'label' => 'Kondisi',
                    'value' => 'kondisi.kondisi',
                    'filter' => Html::activeDropDownList($searchModel, 'kondisi_id', $kondisi,
                            ['class'=>'form-control','prompt' => ''])
                ],     
            
                'keterangan',
                [
                    'attribute' => 'submit_date',
                    'value' => 'submit_date',
                    'filter' => DatePicker::widget(['model'=>$searchModel,
                                                    'attribute' => 'submit_date',
                                                    'language' => 'id',                                                     
                                                    'pluginOptions' => [
                                                        'autoclose'=>true,
                                                        'format' => 'yyyy-mm-dd',
                                                    ]]),
                    'format' => 'raw',
                ],
                
            ],
        ]); ?>
              
            </div>
            <!-- /.box-body -->
            
          </div>
</div>


