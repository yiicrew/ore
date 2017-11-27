<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;
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
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
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
            'class' => 'navbar-dark navbar-expand-lg fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']]
            )
        ],
    ]);
    NavBar::end();
    ?>

    <main class="page-content" role="main">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </main>

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
