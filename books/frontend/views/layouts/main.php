<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header class="header mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-3">
                <span class="logo">Books</span>
            </div>

            <div class="col-9 text-right">
                <a href="/">Books</a>
                <a href="/authors">Authors</a>
            </div>
        </div>
    </div>
</header>

<?= $content ?>

<footer class="footer mt-5">
    <div class="container">
        <p class="pull-left">&copy; Books <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
