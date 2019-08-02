<?php
namespace App\Model;

use App\Model\DatabaseManager;
use Nette\Database\Table\Selection;
use Nette\Database\Table;
use App\Model\ArticleManager;

class HomepageManager extends DatabaseManager
{
    /**
     * select all item to homepage
     */
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
        return $this->database->table(UserManager::TABLE_NAME)->where(UserManager::COL_HP, 1)->order(UserManager::COL_ORDER)->fetchAll();
    }
}
