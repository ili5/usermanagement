<?php
namespace App\Models;

class Model{

    public $db;

    public function __construct(){
        $config = include(__DIR__."/../../config/db.php");
        $pdo = new \PDO("mysql:host=".$config['host'].";dbname=".$config['db_name'], $config['db_user'], $config['db_pass']);
        $this->db = new \FluentPDO($pdo);
    }
}