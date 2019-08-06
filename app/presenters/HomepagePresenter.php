<?php

namespace App\Presenters;

use App\Model\ArticleManager;
use App\Model\HomepageManager;
use App\Model\UserManager;
use App\Model\DatabaseManager;
use Nette;
use Nette\ComponentModel\IComponent;


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

    /**
     * @var HomepageManager @inject
     */
    public $websiteElementValueHeader;

    /**
     * @var HomepageManager @inject
     */
    public $websiteElementValueFooter;

    public $database;



    public function __construct()
    {
        parent::__construct();
    }

    public function renderWebComp()
    {
        $website = $this->websiteElementValueHeader->getElementHeader();

        try {
            $this->websiteElementValueHeader->getElementHeader();
        } catch (\Exception $e) {
            throw new \Exception("fff" . $e->getMessage());
        }

        $this->getTemplate()->websiteElementValue = $website;
    }
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

        //render for header and footer tag elements

        $website = $this->websiteElementValueHeader->getWebsiteElement();

        try {
            $this->websiteElementValueHeader->getWebsiteElement();
        } catch (\Exception $e) {
            throw new \Exception("fff" . $e->getMessage());
        }

        $this->getTemplate()->websiteElementValueHeader = $website;
    }

    protected function createComponentAddElement()
    {
        $form = new Nette\Application\UI\Form();
        $form->addText('main_title', 'Main_title:')->setRequired();
        $form->addText('title_image', 'Main Header Imge:')->setRequired();
        $form->addSubmit('sbmtEl', 'Add Elememnt');
        $form->onSuccess[] = [$this, 'addingElementSuccessed'];

        return $form;
    }

    public function addingElementSuccessed(Nette\Application\UI\Form $form, array $values)
    {
        try {
            // Pokusí se vložit nového uživatele do databáze.
            //$this->database->table(ArticleManager::DB_TABLE)->insert(["eeee"=> 'eeee']);
            //$post = $this->database->([$values]);
            //dump($values);
            $this->websiteElementValueHeader->websiteElement($values);
            dump($values);


        } catch (\Exception $e) {
            // Vyhodí výjimku, pokud uživatel s daným jménem již existuje.
            throw new \Exception($e->getMessage());
        }
    }

    protected function createComponentLoginUser()
    {
        /**
         * @TODO pak dodelat admin. role v db do selectu
         * tady to funguje
         */
        $login = new Nette\Application\UI\Form();
        $login->addText('username', 'Username:')->setRequired();
        $login->addPassword('password', 'Password');
        $login->addSubmit('submit', 'login');
        $login->onSuccess[] = [$this, 'loginSuccessed'];

        return $login;
    }

    public function loginSuccessed(Nette\Application\UI\Form $login, array $values)
    {
        /*   try {
                $this->userManager->getArticle();
           } catch (\Exception $e) {
               throw new \Exception($e->getMessage());
           }*/
        $usernameValue = $this->getParameter('username');
        if($values["username"] == "admin")
        {
            $this->flashMessage('Login Successfully', 'success');
        } else {
            echo "error";
            $this->flashMessage('login failed ! maybe user name does not exists', 'danger');
        }

        try {
            echo "value";
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }
}
