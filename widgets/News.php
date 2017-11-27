<?php

namespace app\widgets;

use Yii;
use yii\bootstrap\Widget;
use app\models\Article;

class News extends Widget
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
