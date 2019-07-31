<?php

namespace App\Presenters;

use App\Model\UserManager;
use Nette;
use Nette\Application\UI\Presenter;


final class UserPresenter extends Presenter
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
    //public $records;

    /**
     * @var UserManager @inject
     */
    private $model;



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

    protected function createComponentAddUser()
    {
        /**
         * @TODO pak dodelat admin. role v db do selectu
         * tady to funguje
         */
        $formAddUser = new Nette\Application\UI\Form();
        $formAddUser->addText('username', 'Username')->setRequired();
        $formAddUser->addText('role', 'role:')->setRequired();
        $formAddUser->addText('url', 'url:')->setRequired();
        $formAddUser->addTextArea('sign', 'About author ')->setRequired();
        $formAddUser->addText('prof_image', 'Profil image: ')
            ->setRequired();
        $formAddUser->addSubmit('submitAddU', 'add user');
        $formAddUser->onSuccess[] = [$this, 'addingUserSuccessed'];

        return $formAddUser;
    }

    protected function createComponentEditForm()
    {
        $formEditUser = new Nette\Application\UI\Form();
        $formEditUser->addText('username', 'Username')->setRequired()->setDefaultValue("eee");

        $formEditUser->addText('role', 'role:')->setRequired();
        $formEditUser->addText('url', 'url:')->setRequired();
        $formEditUser->addTextArea('sign', 'About author:')
            ->setRequired();
        $formEditUser->addSubmit('submitAddU', 'Privat uzivatele');
        $formEditUser->onSuccess[] = [$this, 'editUserSuccessed'];


        return $formEditUser;
    }

    public function actiionEdit()
    {
        $postId = $this->getParameter('user');
    }



    public function editUserSuccessed(Nette\Application\UI\Form $formEditUser, Nette\Utils\ArrayHash $values)
    {
        echo "eeeewewqrq";
    }

    public function addingUserSuccessed(Nette\Application\UI\Form  $formAddUser, array $values)
    {
        try {
            $user = $this->userManager->insertUser($values);
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

