<?php

namespace App\Controllers;

class PageController extends Controller {

    public function homePage(){
        $testVar = "This is test var";
        return $this->render('home.html', ['testVar' => $testVar]);
    }

    public function loginPage(){
        return $this->render('login.html');
    }

    public function registerPage(){
        return $this->render('register.html');
    }
}