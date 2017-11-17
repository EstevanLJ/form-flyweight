<?php

namespace App;

use App\Inputs\Text;
use App\Inputs\Textarea;
use App\Inputs\Select;

class InputFactory {

    protected $inputs = [];

    public function build($name) {

        if(array_key_exists($name, $this->inputs)) {

            return $this->inputs[$name];

        } else {
            $newInput = $this->createInput($name);   

            array_push($this->inputs, $newInput);

            return $newInput;
        }

    }

    private function createInput($name) {
        switch ($name) {
            case 'text':
                return new Text();
            case 'textarea':
                return new Textarea();
            case 'select':
                return new Select();
            default:
                throw new \Exception('Input não existente!');
        }
    }


}