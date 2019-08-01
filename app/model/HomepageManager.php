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
}
