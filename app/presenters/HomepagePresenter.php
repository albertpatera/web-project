<?php

namespace App\Presenters;

use App\Model\ArticleManager;
use App\Model\HomepageManager;
use App\Model\UserManager;
use App\Model\DatabaseManager;
use Nette;
use Nette\ComponentModel\IComponent;
use Texy\Texy;


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
        $texy = new Texy();
        $texy->imageModule->root = 'images/';  // specify image folder
        $texy->allowed['phrase/ins'] = true;
        $texy->allowed['phrase/del'] = true;
        $texy->allowed['phrase/sup'] = true;
        $texy->allowed['phrase/sub'] = true;
        $texy->allowed['phrase/cite'] = true;
        $texy->allowed['emoticon'] = true;
        $output = $texy->process("albert :-)");
        echo $output;
        $article = $this->articleValue->getArticles();
        $this->getTemplate()->articleValue = $article;
        try {
            $userValue = $this->userValue->getUserToHp();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        $this->getTemplate()->userValue = $userValue;

        //if (!($article = $this->articleValue->getArticles())) {
          //  $this->error(); // Vyhazuje výjimku BadRequestException.
       // }
        
	try {
            $userValue = $this->userValue->getUserToHp();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }


        try {
            $article = $this->articleValue->getArticles();
            if (!($userValue = $this->userValue->getUserToHp())) {
                //$this->error($e->getMessage()); // Vyhazuje výjimku BadRequestException.
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
        $login->onSuccess[] = [$this, 'editUserSuccessed'];

        return $login;
    }


    public function editUserSuccessed(Nette\Application\UI\Form $formEditUser, Nette\Utils\ArrayHash $values)
    {
        $user = $this->getUser();
        $user->login('Albert Patera', '123456');

        $user->isLoggedIn();
        $user->setExpiration('30 minutes');
        $user->getLogoutReason();

        try {
            $user->login("Albert Patera", "000");

            $user->isLoggedIn();
            $this->redirect( 'User:edit');

            $user->setExpiration('30 minutes');
            $user->getLogoutReason();

        } catch (\Nette\Security\AuthenticationException $e) {
            throw new \Exception($e->getMessage());
        }

    }
}
