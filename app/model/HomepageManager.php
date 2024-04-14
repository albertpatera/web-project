<?php
namespace App\Model;

use App\Model\DatabaseManager;
use Nette\Database\Table\Selection;
use Nette\Database\Table;
use App\Model\ArticleManager;
use Tracy\Debugger;

class HomepageManager extends DatabaseManager
{
    /**
     * select all item to homepage
     */
    CONST
            COL_EL_ID = 'id',
            COL_EL_TYPE = 'type',
            COL_EL_VISIBLE = 'visible',
            COL_EL_MAIN_TITLE = 'main_title',
            TABLE_EL_NAME = 'elements',
            ELEMENT_TYPE_HEADER = 'header',
            ELEMENT_TYPE_FOOTER = 'footer';




    public function getElementHeader()
    {
        try {
            $this->database->table(self::TABLE_EL_NAME)->order(self::COL_EL_ID)->where('type', 'header')->fetchAll();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return $this->database->table(self::TABLE_EL_NAME)->order(self::COL_EL_ID)->where('type', 'header')->fetchAll();

    }

    public function getElementFooter()
    {
        try {
            $this->database->table(self::TABLE_EL_NAME)->order(self::COL_EL_ID)->where('type', 'footer');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return $this->database->table(self::TABLE_EL_NAME)->order(self::COL_EL_ID)->where('type', 'footer');

    }

    public function getUsers()
    {
        return $this->database->table(ArticleManager::DB_TABLE)->order(ArticleManager::COL_ORDER . " DESC");
    }

    public function getUserToHp()
    {
        try {
            $this->database->table(UserManager::TABLE_NAME)->where(UserManager::COL_HP, 1)->order(UserManager::COL_ORDER)->fetchAll();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        return $this->database->table(UserManager::TABLE_NAME)->where(UserManager::COL_HP, 1, UserManager::COL_ID, 64)->order(UserManager::COL_ORDER)->fetchAll();
    }

    public function websiteElement(array $eleArr)
    {
        try {

            //$this->database->table(self::TABLE_EL_NAME)->insert([$eleArr]);
            $this->database->table(self::TABLE_EL_NAME)->insert([$eleArr]);
            echo "<h3>super</h3>";

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getWebsiteElement()
    {
        return $this->database->table(self::TABLE_EL_NAME)->fetchAll();
    }

}
