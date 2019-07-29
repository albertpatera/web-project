<?php


namespace App\Model;
use App\Model\DatabaseManager;
use App\Presenters\ArticlePresenter;
use Nette\Utils\ArrayHash;
use Nette\Database\Connection;
use Nette\Database\Table\Selection;
use Nette\Database\Table;


class ArticleManager extends DatabaseManager
{
    /**
     * @var ArticlePresenter @inject
     */
    public $articleManager;
    CONST   COL_ARTICLE_ID = 'id',
            COL_ORDER = 'url',
            COL_CONTENT = 'content',
            DB_TABLE = 'articles',
            COL_PEREX = 'perex';
    /**
     * @var ArticleManager @inject
     */
    public $perex;
    public function getArticles()
    {
        return $this->database->table(self::DB_TABLE)->order(self::COL_ARTICLE_ID . ' DESC');
    }

    public function saveArticle($url) {
        return $this->database->table(self::DB_TABLE)->insert(array(self::COL_CONTENT=> "this"));
    }


}