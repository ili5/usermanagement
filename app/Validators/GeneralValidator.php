<?php
namespace App\Validators;

use Particle\Validator\Validator;

class GeneralValidator{

    /**
     * @var array
     */
    protected $data;

    /**
     * @var Validator
     */
    protected $validator;

    public function __construct($data){
        $this->data = $data;
        $this->validator = new Validator();

    }

    protected function validatorRules(){}

    public function isValid(){
        $this->validatorRules();
        $result = $this->validator->validate($this->data);
        $this->data = $result->getValues();
        return ($result->isValid())?$result->isValid():$result->getMessages();
    }

    public function getValues(){
        return $this->data;
    }
}