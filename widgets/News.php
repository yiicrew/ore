<?php

namespace app\widgets;

use Yii;
use app\models\Article;

class News extends \yii\bootstrap\Widget
{
    public $limit = 3;

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $articles = Article::find()->latestNews()
            ->limit($this->limit)
            ->all();

        if (empty($articles)) {
            return null;
        }

        return $this->render('news', [
            'articles' => $articles,
        ]);
    }
}
