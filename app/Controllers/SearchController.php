<?php
namespace App\Controllers;

use App\Models\User;

class SearchController extends Controller{

    public function search(){
        if(!isset($_SESSION['user'])){
            return $this->render('login.html', ['errorMsg' => "Please login"]);
        }

        $userModel = new User();

        $data = $_GET;

        $result = $userModel->search($data);

        $users = [];
        foreach($result as $user){
            $users[] = $user;
        }
        if(sizeof($users) > 0){
            return $this->render('result.html', ['result' => $users]);
        }else{
            return $this->render('result.html', ['noResult' => true]);
        }

    }
}