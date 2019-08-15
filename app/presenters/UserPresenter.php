<?php

namespace App\Presenters;

use App\Model\AdminManager;
use App\Model\UserManager;
use Nette;
use Nette\Application\UI\Presenter;
use Tester\Environment;
use Tracy\Debugger;


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


    //session workflow
    /**
     * @var Nette\Http\Session
     */
    private $session;
    /**
     * @var Nette\Http\Session;
     */
    private $sessionSection;

    /**
     * @var AdminManager @inject
     */
    private $adminManager;
    public function __construct(Nette\Http\Session $session)
    {
        $this->sessionSection = 'albert';

    }

//save relation
    public function renderAdd()
    {
        $user = $this->userManager->getUsers();

        $this->getTemplate()->userValue = $user;
    }


    public function renderEdit($id = null)
    {

        try {
            $user = $this->userManager->getArticle($id);
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

   /* public function actionEdit()
    {
        $postId = $this->getParameter('user');
    }*/





    public function editUserSuccessed(Nette\Application\UI\Form $formEditUser, Nette\Utils\ArrayHash $values)
    {
       dumpe("eee");
        //$postId = $this->getParameter('postId');
        $postId = $this->getParameter('postId');

        if ($postId) {
            $post = $this->database->table('posts')->get($postId);
            $post->update($values);
        } else {
            $post = $this->database->table('posts')->insert($values);
        }

        $this->flashMessage('Příspěvek byl úspěšně publikován.', 'success');
        $this->redirect('show', $post->id);
        $user = $this->getUser();
        $user->login('Albert Patera', '000');;

        $user->isLoggedIn();
        $user->setExpiration('30 minutes');
        $user->getLogoutReason();

        try {
            $user->login('admin', '123456');;

            $user->isLoggedIn();
            $user->setExpiration('30 minutes');
            $user->getLogoutReason();

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }

    public function renderLogout()
    {
        $user = $this->getUser();
       try {

           $user->login('Albert Patera', '000');;
           $user->getLogoutReason();
           $user->isLoggedIn();
           $user->setExpiration('30 minutes');
           $user->getLogoutReason();
       } catch (\Exception $e) {
           throw new \Exception($e->getMessage());
       }
    }


        public function actionEdit($postId)
        {
          /*  try {
                $post = $this->database->table('posts')->get($postId);
            } catch (\Exception $e) {
                throw new \Exception("this" . $e->getMessage());
            }
                if (!$post) {
                $this->error('Příspěvek nebyl nalezen');

          }
            $this['postForm']->setDefaults($post->toArray());*/
        }


    public function addingUserSuccessed(Nette\Application\UI\Form  $formAddUser, array $values)
    {
       dumpe("eee");
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

