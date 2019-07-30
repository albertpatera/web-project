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
        COL_ID = 'id';
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
            echo "insertiíng ok";
        } catch (\Exception $e) {
            echo "<h3 class='text-danger'>Error while inserting user</h3>";
            throw new \Exception($e->getMessage());
        }
    }

    public function getUsers()
    {
        return $this->database->table(self::TABLE_NAME)->order(self::COL_ORDER . " DESC");
    }

    public function deleteUser($user)
    {
        return $this->database->table(self::TABLE_NAME)->where(self::COL_ID, 15)->delete();
    }

    public function getUser($url)
    {

        return $this->database->table(self::TABLE_NAME)->where(self::COL_ID, 24)->fetch();

    }
}
