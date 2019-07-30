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



    public function renderAdd()
    {
        $user = $this->userManager->getUsers();

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
         */
        $formAddUser = new Nette\Application\UI\Form();
        $formAddUser->addText('username', 'Username')->setRequired();
        $formAddUser->addText('role', 'role:')->setRequired();
        $formAddUser->addSubmit('submitAddU', 'Privat uzivatele');
        $formAddUser->onSuccess[] = [$this, 'addingUserSuccessed'];

        return $formAddUser;
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

