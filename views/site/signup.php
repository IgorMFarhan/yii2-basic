<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Unit1;
use app\models\Unit2;
use app\models\Kota;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}"
];

?>

<div class="login-box">    
    <div class="login-box-body">
        <div class="text-center" style="padding-top:15px">
            <?= Html::img('@web/img/jawara.png', ['alt'=>'Jawara', 'style'=>'width: 200px; margin-bottom: 15px']);?>
        </div>
        <h4 class="login-box-msg">Buat Akun Baru</h4>


        <?php $form = ActiveForm::begin(['id' => 'signup-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'nik', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => 'NIK atau no. HP']) ?>
        
        <?= $form
            ->field($model, 'nama', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => 'nama lengkap']) ?>

        <?= $form
            ->field($model, 'unit1_id', $fieldOptions1)
            ->label(false)
            ->dropdownList(ArrayHelper::map(Unit1::find()->all(),'id','unit1'),
                ['prompt'=>'pilih lokasi kerja']); ?>
        
        <?= $form
            ->field($model, 'unit2_id', $fieldOptions1)
            ->label(false)
            ->dropdownList(ArrayHelper::map(Unit2::find()->all(),'id','unit2'),
                ['prompt'=>'pilih lokasi gedung']); ?>
        
        <?= $form
            ->field($modelunit, 'unit2', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => 'jika lokasi gedung tidak ada']) ?>

        <?= $form
            ->field($model, 'unit2_id', $fieldOptions1)
            ->label(false)
            ->dropdownList(ArrayHelper::map(Kota::find()->all(),'id','nama_kota'),
                ['prompt'=>'pilih kota']); ?>

       

        <div style="padding-top:10px">

        <?= Html::submitButton('Buat Akun',
            ['class' => 'btn btn-success btn-block','name' => 'login-button', 'tabindex' => '4']) 
        ?>
        <?php ActiveForm::end(); ?>   

        </div>
    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->


