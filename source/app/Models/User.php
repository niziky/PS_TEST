<?php
namespace App\Models;

class User extends AppModel{
    
    
    public function __construct() {
        parent::__construct();
        $this->table = 'users';
    }
    
    public function findUserByUserName($username)
    {
        $statement = $this->connection->prepare('SELECT * FROM users WHERE user_name=?');
        $statement->execute(array($username));
        $user = $statement->fetchObject(__CLASS__);
        return $user;
    }
}