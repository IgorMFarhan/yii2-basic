<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diarium */

$this->title = 'Update Diarium: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Diaria', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diarium-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
