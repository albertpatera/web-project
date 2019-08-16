<?php
namespace App\Model;
use App\Model\DatabaseManager;
use mysql_xdevapi\Exception;
use Nette\Database\Table;
use Nette\Database\Table\Selection;
use Nette\Database\UniqueConstraintViolationException;
use Nette\Security\AuthenticationException;
use Nette\Security\IAuthenticator;
use Nette\Utils\ArrayHash;
use Tracy\Debugger;
use Nette\Security\Passwords;
use Nette\Security\Identity;


class UserManager extends DatabaseManager implements IAuthenticator
{
    CONST
        TABLE_NAME = 'user',
        COL_USERNAME = 'username',
        COL_ORDER = 'id',
        COL_ID = 'id',
        COL_URL = 'url',
        COL_HP = 'hp',
        COL_PASSWORD = 'password',
        COL_ROLE = 'role';
    public function insertUser(array $username)
    {
        try {
            if(empty($username[self::COL_ID])) {
                $this->database->table(self::TABLE_NAME)->insert([$username]);
                Debugger::barDump('inserting..');
            } else {
                $this->database->table(self::TABLE_NAME)->where(self::COL_ID, $username[self::COL_ID])->update([$username]);
                Debugger::barDump("updating");
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }


    public function updateUser($user)
    {
        return $this->database->table(self::TABLE_NAME)->update($user);
    }

    public function getUsers()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COL_URL . " DESC");
    }

    public function deleteUser($user)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COL_ID, $user)->delete();
    }

    public function getUserByRole($url = null)
    {

        return $this->database->table(self::TABLE_NAME)->where(AdminManager::COL_ROLE, $url)->fetchAll();
    }

    public function authenticate(array $credentials)
    {
        list($username, $password) = $credentials; // Extrahuje potřebné přihlašovací údaje.

        // Najde a vrátí první záznam uživatele s daným jménem v databázi nebo false, pokud takový uživatel neexistuje.
        $user = $this->database->table(self::TABLE_NAME)->where(self::COL_USERNAME, $username)->fetch();

        // Ověření uživatele.
       if (!$user) { // Vyhodí výjimku, pokud uživatel neexituje.
            throw new AuthenticationException('Zadané uživatelské jméno neexistuje.', self::IDENTITY_NOT_FOUND);
        //} else if (!Passwords::verify("12346", $user[self::COL_PASSWORD])) { // Ověří zadané heslo.
            // Vyhodí výjimku, pokud je heslo špatně.
            //throw new AuthenticationException('Zadané heslo není správně.', self::INVALID_CREDENTIAL);
        } else if (Passwords::needsRehash($user[self::COL_PASSWORD])) { // Zjistí zda heslo potřebuje rehashovat.
            // Rehashuje heslo (bezpečnostní opatření).
            $user->update([self::COL_PASSWORD => $password]);
        }

        // Příprava atributů z databáze pro identitu úspěšně přihlášeného uživatele.
        $userAttributes = $user->toArray(); // Převede uživatelská data z databáze na PHP pole.
        unset($userAttributes[self::COL_PASSWORD]); // Odstraní hash hesla z uživatelských dat (kvůli bezpečnosti).

        // Vrátí novou identitu úspěšně přihlášeného uživatele.
        return new Identity($user[self::COL_ID], $user[self::COL_ROLE], $userAttributes);
    }



    /**
     * @param null $url
     * @return array|Table\IRow[]
     * @throws \Exception
     * @TODO I must solve how to print anly one item from database via ->fetch();
     */
    public function getArticle($id = null)
    {
       try {
           return $this->database->table(self::TABLE_NAME)->where(self::COL_ID, 64)->fetchAll();

       } catch (\Exception $e) {
           throw new \Exception('url does not exists');
       }
       // return $this->database->table(self::TABLE_NAME)->where(self::COL_URL, $url)->fetch();
    }

    public function getUser($user) {
        try {
            $this->database->table(self::TABLE_NAME)->where(self::COL_USERNAME, $user)->fetch();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }





    public function getUserToHp()
    {
       try {
            $this->database->table(self::TABLE_NAME)->where(self::COL_HP, 1)->order(self::COL_URL . " DESC");

       } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
       }

        return $this->database->table(self::TABLE_NAME)->where(self::COL_HP, 1)->order(self::COL_URL . " DESC");
    }

    public function authorize(array $permissions)
    {
        $user = $this->database->table(self::TABLE_NAME)->where(self::COL_USERNAME, 'albert')->fetch();
        try {
            $user = $this->database->table(self::TABLE_NAME)->where(self::COL_USERNAME, 'eeeeer')->fetch();


        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function register($username, $password) {
        try {
            $this->database->table(self::TABLE_NAME)->insert([
                self::COL_USERNAME => $username,
                self::COL_PASSWORD => Passwords::hash($password)
            ]);

            //$user->login($username, $password);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
