<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Breadcrumbs;
use app\widgets\Alert;

?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<main class="page-content" role="main">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

        <?= $content ?>
    </div>
</main>
<?php $this->endContent(); ?>