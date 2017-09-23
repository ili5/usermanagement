<?php
namespace App\Controllers;

use App\Models\User;
use App\Validators\LoginValidator;
use App\Validators\RegisterValidator;

class UserController extends Controller{

    public function login(){
        $data = $_POST;
        $validator = new LoginValidator($data);

        $formValidation = $validator->isValid();

        if(is_array($formValidation)){
            header("Location: /login");
            return $this->render('login.html', ['errorMsg' => 'Error logging you in.', 'errors' => $formValidation, 'oldInput' => $data]);
        }

        $userModel = new User();

        $checkAuth = $userModel->findByEmailAndPassword($data['email'], $data['password']);
        if($checkAuth){
            $_SESSION['user'] = $checkAuth;
            header("Location: /");
            return $this->render('home.html');
        }

        header("Location: /login");
        return $this->render('login.html', ['errorMsg' => 'Error logging you in.', 'oldInput' => $data]);
    }

    public function register(){
        $data = $_POST;
        $validator = new RegisterValidator($data);

        $formValidation = $validator->isValid();

        if(is_array($formValidation)){
            header("Location: /register");
            return $this->render('register.html', ['errors' => $formValidation, 'oldInput' => $data]);
        }

        $userModel = new User();

        $checkUserExist = $userModel->checkIfUserExist($data['email']);

        if($checkUserExist){
            header("Location: /register");
            return $this->render('register.html', ['errorMsg' => 'User exist. Please login or choose different email']);
        }

        $userModel->register($data);

        header("Location: /register");
        return $this->render('register.html', ['success' => 'Successful registration. Please login.']);
    }

    public function logout(){
        unset($_SESSION['user']);
        header("Location: /");
        return $this->render('home.html');
    }
}