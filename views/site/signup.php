<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form ActiveForm */
?>
<div class="site-signup">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'nik') ?>
        <?= $form->field($model, 'unit1_id') ?>
        <?= $form->field($model, 'unit2_id') ?>
        <?= $form->field($model, 'kota_id') ?>
        <?= $form->field($model, 'auth_key') ?>
        <?= $form->field($model, 'nama') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-signup -->
