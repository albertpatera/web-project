<?php
namespace App\Model;
use App\Model\DatabaseManager;
use Nette\Database\Table;
use Nette\Database\Table\Selection;
use Nette\Utils\ArrayHash;
use Tracy\Debugger;

class AdminManager extends DatabaseManager
{
    CONST
        TABLE_NAME = 'user',
        COL_USERNAME = 'username',
        COL_ORDER = 'id',
        COL_ID = 'id',
        COL_URL = 'url',
        COL_HP = 'hp',
        COL_ROLE = 'role';

    public function getUsers()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COL_URL . " DESC");
    }

    public function deleteUser($user)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COL_ID, $user)->delete();
    }

    /**
     * @param null $url
     * @return array|Table\IRow[]
     * @throws \Exception
     * @TODO I must solve how to print anly one item from database via ->fetch();
     */
    public function getUserByRole($url = null)
    {
         return $this->database->table(self::TABLE_NAME)->where(self::COL_ROLE, $url)->fetchAll();
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
}
