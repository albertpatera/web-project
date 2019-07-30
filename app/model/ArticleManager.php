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
            COL_CONTENT = 'description',
            DB_TABLE = 'article',
            COL_PEREX = 'description';
    /**
     * @var ArticleManager @inject
     */
    public $perex;

    public function getArticles()
    {
        return $this->database->table(self::DB_TABLE)->order(self::COL_ORDER . ' DESC');
    }

    public function register($username) {
        try {

            $this->database->table("new_table")->insert( [$username]);
            echo "<h3>super</h3>";
            /*dumpe($username);*/

        } catch (\Exception $e) {
            echo "error thile inserting";
            dumpe($username);
            throw new \Exception($e->getMessage());
        }

    }

    public function saveArticle(array $credit) {
       list($username) = $credit;
        $username = $this->database->table(self::DB_TABLE)->insert([self::COL_PEREX => 'eee']);
        //if()
        $usernameOvereni = (!$username) ? 'ok..' : 'error';

    }


}