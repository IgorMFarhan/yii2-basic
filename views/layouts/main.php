<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'skip') {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <link rel="shortcut icon" href="@web/img/favicon.png" type="image/x-icon">
        <link rel="icon" href="@web/img/favicon.png" type="image/x-icon">
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>

<?php 
} else if (Yii::$app->controller->action->id === 'login') {

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
    <body class="login-page">

    <?php $this->beginBody() ?>

        <?= $content ?>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>

    <?php

} else if (Yii::$app->controller->action->id === 'rekap'){
    echo $this->render(
        'main-index',
        ['content' => $content]
    );

} else  {

        echo $this->render(
            'main-layout',
            ['content' => $content]
        );
    }
?>

