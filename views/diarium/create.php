<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Diarium */

$this->title = 'Create Diarium';
$this->params['breadcrumbs'][] = ['label' => 'Diaria', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diarium-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
