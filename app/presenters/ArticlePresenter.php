<?php

namespace App\Presenters;

use App\Model\ArticleManager;
use mysql_xdevapi\Exception;
use Nette\Application\UI\Presenter;
use Nette;
use App\Model\DatabaseManager;


final class ArticlePresenter extends Presenter
{
    /**
     * @var ArticleManager @inject     */
    public $articleValue;
    /**
     * @var ArticleManager @inject
     */
    public $articleValueNow;

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
        $this->getTemplate()->articleValueNow = $article;
        if (!($article = $this->articleValue->getArticles()))
            $this->error(); // Vyhazuje výjimku BadRequestException.

        try {
            $article = $this->articleValue->getArticles();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        try {
            $articleForNow = $this->articleValueNow->getArticleForNow();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        $this->getTemplate()->articleValueNow = $articleForNow;
    }

    public function renderEdit()
    {
        $detail = $this->articleValue->getArticles();
        $this->getTemplate()->articleValue = $detail;
    }

    protected function createComponentAddArticle()
    {
       $form = new Nette\Application\UI\Form();
       $form->addText('perex', 'Perex:')->setRequired();
       $form->addText('description', 'description:')->setRequired();
       $form->addSubmit('sbmt', 'Odeslat');
        $form->onSuccess[] = [$this, 'addingArticleSuccessed'];

        return $form;
    }

    protected function createComponentPostForm()
    {
        $form = new Nette\Application\UI\Form();
        $form->addText('username', 'Titulek:')
            ->setRequired();
        $form->addTextArea('description', 'description')
           ->setRequired();

        $form->addText('date_created', 'date_created')->setType('date')
           ->setRequired();
        $form->addText('title_image', 'main section image:')
            ->setRequired();

        $form->addText('url', 'article url::')
            ->setRequired();


        $form->addSubmit('send', 'Uložit a publikovat');
        $form->onSuccess[] = [$this, 'postFormSucceeded'];

        return $form;
    }

    public function postFormSucceeded(Nette\Application\UI\Form $form, array $values)
    {
        $article = $this->articleValue->register($values);
        if(!$article) {
            echo "super";
            dump($values);
        } else {
            echo "eeee";
        }
        $this->flashMessage("Příspěvek byl úspěšně publikován.", 'success');

    }

    public function addingArticleSuccessed(Nette\Application\UI\Form $form, array $values)
    {
        try {
            $post = $this->database->table(ArticleManager::DB_TABLE)->insert($values);
        } catch (\Exception $e) {
            // Vyhodí výjimku, pokud uživatel s daným jménem již existuje.
            throw new \Exception("error inserting article");
        }
    }

    public function actionEdit($postId)
    {

        try {
            $user = $this->articleValue->getArticleFromCategory($postId);
        } catch (\Exception $e) {
            throw new \Exception('ERROR:' . $e->getMessage());
        }

        $this->getTemplate()->userValue = $user;
    }
}

