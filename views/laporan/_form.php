<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Laporan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="laporan-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'user_id')->textInput() ?>

        <?= $form->field($model, 'unit1_id')->textInput() ?>

        <?= $form->field($model, 'unit2_id')->textInput() ?>

        <?= $form->field($model, 'lokasi_id')->textInput() ?>

        <?= $form->field($model, 'kondisi_id')->textInput() ?>

        <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model,'today')->widget(DatePicker::className(),[
                    'options' => [
                        'placeholder' => 'Enter birth date ...'
                    ],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]); 
        ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
