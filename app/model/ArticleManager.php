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
            COL_PEREX = 'description',
            COL_DATE_CREATED = 'date_created' ;

    /**
     * @var ArticleManager @inject
     */
    public $perex;

    public function getArticles()
    {
        return $this->database->table("new_table")->order(self::COL_ARTICLE_ID . ' DESC')->fetchAll();
    }

    public function getArticle($url)
    {
        return $this->database->table(self::DB_TABLE)->where(self::COL_ORDER, $url)->fetch();
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

    public function getArticleFromCategory($url)
    {
        return $this->database->table("new_table")->where(self::COL_ORDER, $url)->fetchAll();
    }

    public function getArticleForNow()
    {
        $dateNow = new \DateTime();
        $dateFinal = $dateNow->format('Y-m-d');

        try {
             $this->database->table(self::DB_TABLE)->where(self::COL_ORDER, $dateFinal)->fetchAll();
            echo "super, jede toooo";
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return $this->database->table("new_table")->where(self::COL_DATE_CREATED, $dateFinal)->fetchAll();


    }


}