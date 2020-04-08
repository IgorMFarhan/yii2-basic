<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiariumSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diarium-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nik') ?>

    <?= $form->field($model, 'unit1') ?>

    <?= $form->field($model, 'unit2') ?>

    <?= $form->field($model, 'lokasi_id') ?>

    <?php // echo $form->field($model, 'kondisi_id') ?>

    <?php // echo $form->field($model, 'submit_date') ?>

    <?php // echo $form->field($model, 'versi_app') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
