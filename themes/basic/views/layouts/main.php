<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\BasicAsset;

BasicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script>
        window.ORE = {
            heroImage: '<?= Url::to('@web/uploads/hero.jpg', true) ?>'
        };
    </script>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <?php
    NavBar::begin([
        'brandLabel' => Html::img('/uploads/ore.svg', ['width' => 70]), //Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'containerOptions' => ['class' => 'navbar-collapse justify-content-end'],
        'options' => [
            'class' => 'navbar-dark navbar-expand-lg',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Buy', 'url' => ['/site/index']],
            ['label' => 'Rent', 'url' => ['/site/about']],
            ['label' => 'Special offers', 'url' => ['/site/about']],
            ['label' => 'News', 'url' => ['/site/about']],
            ['label' => 'Find agents', 'url' => ['/site/contact']],
            ['label' => 'List your property', 'url' => ['/site/about']],
            ['label' => 'Contact us', 'url' => ['/site/about']],
            '<li class="nav-item nav-divider">&nbsp</li>',
            [
                'label' => 'Login', 
                'url' => ['/site/login'], 
                'visible' => Yii::$app->user->isGuest
            ],
            [
                'label' => 'Sign Up', 
                'url' => ['/site/signup'],
                'visible' => Yii::$app->user->isGuest,
                'linkOptions' => ['class' => 'btn btn-primary navbar-btn']
            ],
            [
                'label' => 'Logout', 'url' => ['/site/logout'], 
                'visible' => !Yii::$app->user->isGuest,
                'linkOptions' => ['data-method' => 'post', 'class' => 'btn btn-sm btn-primary']
            ]
        ],
    ]);
    NavBar::end();
    ?>

    <?= $content ?>

    <footer class="page-footer">
        <div class="container">
            <p class="copyright float-md-left">&copy; <?= Yii::$app->name ?> <?= date('Y') ?></p>
            <p class="powered-by float-md-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
