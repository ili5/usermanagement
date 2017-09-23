<?php

namespace App\Models;

class User extends Model{

    public function getAllUsers(){
        return $this->db->from('users')->execute();
    }

    public function findByEmailAndPassword($email, $password){
        $password = md5($password);

        return $this->db->from('users')->where('email = ?', $email)->where('password = ?', $password)->fetch();
    }

    public function checkIfUserExist($email){
        return $this->db->from('users')->where('email = ?', $email)->fetch();
    }

    public function register($data){
        $values = [
            'email' =>  $data['email'],
            'password'  =>  md5($data['password']),
            'name'  =>  $data['name'],
            'created_at'    =>  date("Y-m-d H:i:s", time())
        ];
        $this->db->insertInto('users', $values)->execute();
        return true;
    }

    public function search($urlParams){

        $result = $this->db->from('users')
            ->where("(email LIKE ? OR name LIKE ?)", '%'.$urlParams['search'].'%', '%'.$urlParams['search'].'%')->fetchAll();

        return $result;
    }
}