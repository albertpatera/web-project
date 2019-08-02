<?php

namespace App\Presenters;

use App\Model\ArticleManager;
use App\Model\HomepageManager;
use Nette;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    /**
     * @var HomepageManager @inject;
     */
    /**
     * @var ArticleManager @inject
     */
    public $articleValue;
    public function renderWww()
    {
        $article = $this->articleValue->getArticles();
        $this->getTemplate()->articleValue = $article;
        if (!($article = $this->articleValue->getArticles())) {
            $this->error(); // Vyhazuje výjimku BadRequestException.

        }

        try {
            $article = $this->articleValue->getArticles();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
