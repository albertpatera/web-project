<?php

namespace App\Presenters;

use App\Model\ArticleManager;
use mysql_xdevapi\Exception;
use Nette\Application\UI\Presenter;
use Nette;


final class ArticlePresenter extends Presenter
{
    /**
     * @var ArticleManager @inject     */
    public $articleValue;

    /**
     * @var ArticleManager @inject
     */
    public $url;


    public function __construct($url) {
       parent::__construct();
        $this->url = $url;
    }
    public function renderDefault()
    {
        $article = $this->articleValue->getArticles();
        $this->getTemplate()->articleValue = $article;
        if (!($article = $this->articleValue->getArticles()))
            $this->error(); // Vyhazuje výjimku BadRequestException.
    }

    protected function createComponentAddArticle()
    {
       $form = new Nette\Application\UI\Form();
       $form->addText('perex', 'Perex:')->setDefaultValue("ff");
       $form->addSubmit('sbmt', 'Odeslat');
        $form->onSuccess[] = [$this, 'addingArticleSuccessed'];

        return $form;
    }

    public function addingArticleSuccessed(Nette\Application\UI\Form $form, $values)
    {

        try {
            // Pokusí se vložit nového uživatele do databáze.

            $this->database->table(ArticleManager::DB_TABLE)->insert([ArticleManager::COL_PEREX => $values->perex]);
            throw new \Exception("eeeee");
            
        } catch (\Exception $e) {
            // Vyhodí výjimku, pokud uživatel s daným jménem již existuje.
           //dumpe($values);
            //$this->database->table(ArticleManager::DB_TABLE)->insert([ArticleManager::COL_PEREX => $values->perex]);
            throw new \Exception('error while inserting'. $e->getCode() . $e->getMessage());

        }
    }
}

