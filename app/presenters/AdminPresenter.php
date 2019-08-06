<?php

namespace App\Presenters;

use App\Model\AdminManager;
use App\Model\UserManager;
use Nette;
use Nette\Application\UI\Presenter;
use Tracy\Debugger;


final class AdminPresenter extends Presenter
{
    /**
     * @var UserManager @inject
     */
    public $userManager;

    /**
     * @var UserManager @inject
     */
    public $userValue;

    /**
     * @var UserManager @inject
     */
    private $model;

    /**
     * @var AdminManager @inject
     */
    private $adminValue;


    //session workflow

    public function __construct(Nette\Http\Session $session)
    {
   //     $this->sessionSection = 'albert';

    }

//save relation
    public function renderAdd()
    {
        $user = $this->userManager->getUsers();

        $this->getTemplate()->userValue = $user;
    }


    public function renderEdit($user = null)
    {

        try {
            $user = $this->userManager->getArticle($user);
        } catch (\Exception $e) {
            throw new \Exception('ERROR:' . $e->getMessage());
        }

        $this->getTemplate()->userValue = $user;

    }

    public function renderRemove($user = null)
    {
        try {
            $removeUser = $this->userManager->deleteUser($user);
            echo "user deleted";
        } catch (\Exception $e) {
            echo "error while deleting";
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

            $this->flashMessage('Login Successfully>', 'success');
        } else {
            echo "error";
            $this->flashMessage('login failed ! maybe user name does not exists', 'danger');
        }


    }

    public function renderDefault($user = NULL)
    {
        $website = $this->userValue->getUserByRole($user);

        try {
            $this->userValue->getUserByRole();
        } catch (\Exception $e) {
            throw new \Exception("fff" . $e->getMessage());
        }

        $this->getTemplate()->userValue = $website;
    }



    /*public function actiionEdit()
    {
        $postId = $this->getParameter('user');
    }*/

    public function addingUserSuccessed(Nette\Application\UI\Form  $formAddUser, array $values)
    {
        try {
            $user = $this->userManager->insertUser($values);
            $this->sessionSection = $values["username"];

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        if($user) {
            dump($values);
            dump("inserting ok");
            echo "<h3>ok user</h3>";

        } else {
            echo "<h3>error usermanager</h3>";
        }

        dump($values);
    }
}

