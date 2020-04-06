<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Log In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">    
    <div class="login-box-body">
        <div class="text-center" style="padding-top:15px">
            <?= Html::img('@web/img/jawara.png', ['alt'=>'Jawara', 'style'=>'width: 200px; margin-bottom: 15px']);?>
        </div>
        <h4 class="login-box-msg">Flexi Working Arrangement</h4>


        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'nik', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Nomor Induk Karyawan')]) ?>

       

        <div style="padding-top:10px">

        <?= Html::submitButton('Masuk',
            ['class' => 'btn btn-primary btn-block','name' => 'login-button', 'tabindex' => '4']) 
        ?>
        <?php ActiveForm::end(); ?>   

        </div>

        <div style="padding-top:20px; padding-bottom:20px">       

        <?= Html::a('Buat Akun Karyawan Outsource', ['signup'],['class'=>'btn btn-default btn-block btn-flat']) ?>

        </div>
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
