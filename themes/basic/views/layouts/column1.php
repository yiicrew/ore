<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\widgets\Breadcrumbs;
use app\widgets\Alert;

?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<?= $this->render('@app/views/shared/_hero') ?>
<div class="container">
	<?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
	<?= Alert::widget() ?>

	<?= $content ?>
</div>
<?php $this->endContent(); ?>