<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Laporan */

$this->title = 'Lapor Lingkungan';

$request = Yii::$app->request;
$lokasi = $request->get('lokasi');
$kondisi = $request->get('kondisi');


?>

<div class="col-lg-6 col-lg-offset-3">
   
    <h3 style="color:red">SEMANGAT PAGI!!!</h3>
    <h4><?= Yii::$app->user->identity->nama .' ('.Yii::$app->user->identity->nik .')' ?></h4>
    <div class="callout callout-warning">

            <h4>Anda belum check-in hari ini</h4>
            <p>Silahkan laporkan kondisi kesehatan Anda dan lokasi bekerja hari ini</p>

    </div>

    <h4 class="text-center">Laporkan kondisi Keluarga dan Lingkungan hari ini</h4>

    <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'template' => "{label} \n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],

                ]); ?>
        <div class="box-body table-responsive">

        <?php

        if($kondisi == 1){
            echo $form->field($model, 'sakit')->textInput(['placeholder' => 'Penyakit yang sedang diderita Anda'])
                ->label('Sakit');
        } else {
             $model->sakit = null;
        }
        ?>

        <?= $form->field($model, 'keluarga')->textInput(['placeholder' => 'Sehat'])->label('Keluarga') ?>

        <?= $form->field($model, 'lingkungan')->textInput(['placeholder' => 'Dua rekan ODP'])->label('Lingkungan') ?>

        </div>
        <div class="box-footer">
            <?= Html::submitButton('Kirim', ['class' => 'btn btn-success btn-block']) ?>
        </div>
        <?php ActiveForm::end(); ?>

</div>