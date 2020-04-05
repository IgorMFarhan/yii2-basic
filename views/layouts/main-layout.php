<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;


/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="shortcut icon" href='<?= Yii::$app->urlManager->baseUrl . '/img/favicon.png'?>' type="image/x-icon">
    <link rel="icon" href='<?= Yii::$app->urlManager->baseUrl . '/img/favicon.png'?>' type="image/x-icon">
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="main-layout">

<?php $this->beginBody() ?>

<div class="container">
   
   <?= $content ?>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
