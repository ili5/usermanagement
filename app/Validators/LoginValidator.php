<?php
namespace App\Validators;

class LoginValidator extends GeneralValidator {

    protected function validatorRules(){
        $this->validator->required('email')->email();
        $this->validator->required('password')->string();
    }


}