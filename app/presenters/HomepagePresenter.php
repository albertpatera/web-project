<?php

namespace App\Presenters;

use App\Model\ArticleManager;
use App\Model\HomepageManager;
use App\Model\UserManager;
use Nette;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{

    /**
     * @var UserManager @inject
     */
    public $userValue;
    /**
     * @var ArticleManager @inject
     */
    public $articleValue;
    public function renderWww()
    {
        $article = $this->articleValue->getArticles();
        $this->getTemplate()->articleValue = $article;
        try {
            $userValue = $this->userValue->getUserToHp();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        $this->getTemplate()->userValue = $userValue;

        if (!($article = $this->articleValue->getArticles())) {
            $this->error("here is noot working :("); // Vyhazuje výjimku BadRequestException.
        }
        try {
            $userValue = $this->userValue->getUserToHp();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }


        try {
            $article = $this->articleValue->getArticles();
            if (!($userValue = $this->userValue->getUserToHp())) {
                $this->error("Here is not working :( !"); // Vyhazuje výjimku BadRequestException.
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }





    }
}
