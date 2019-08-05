<?php
namespace App\Model;
use App\Model\DatabaseManager;
use Nette\Database\Table;
use Nette\Database\Table\Selection;
use Nette\Utils\ArrayHash;
use Tracy\Debugger;

class UserManager extends DatabaseManager
{
    CONST
        TABLE_NAME = 'user',
        COL_USERNAME = 'username',
        COL_ORDER = 'id',
        COL_ID = 'id',
        COL_URL = 'url',
        COL_HP = 'hp';
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

    /**
     * @param null $url
     * @return array|Table\IRow[]
     * @throws \Exception
     * @TODO I must solve how to print anly one item from database via ->fetch();
     */
    public function getArticle($url = null)
    {
       try {
           return $this->database->table(self::TABLE_NAME)->where(self::COL_URL, $url)->fetchAll();

       } catch (\Exception $e) {
           throw new \Exception('url does not exists');
       }
       // return $this->database->table(self::TABLE_NAME)->where(self::COL_URL, $url)->fetch();
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
