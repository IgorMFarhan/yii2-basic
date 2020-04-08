<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Diarium */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diarium-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nik')->textInput() ?>

        <?= $form->field($model, 'unit1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'unit2')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'lokasi_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kondisi_id')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'submit_date')->textInput() ?>

        <?= $form->field($model, 'versi_app')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
