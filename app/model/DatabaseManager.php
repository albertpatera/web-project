<?php
namespace App\Model;

use Nette\Database\Context;

/**
 * Class DatabaseManager
 * @package App\Model
 */
class DatabaseManager
{
    protected $database;
    public function __construct(Context $database)
    {
        $this->database = $database;
    }
}