<?php

namespace App;

use App\Inputs\Text;
use App\Inputs\Textarea;
use App\Inputs\Select;
use App\Inputs\Checkbox;

class InputFactory {

    protected static $inputs = [];

    public static function build($name) {

        if(array_key_exists($name, self::$inputs)) {

            return self::$inputs[$name];

        } else {

            $newInput = self::createInput($name);   

            array_push(self::$inputs, $newInput);

			return $newInput;
			
        }

    }

    private static function createInput($name) {
        switch ($name) {
            case 'text':
                return new Text();
            case 'textarea':
                return new Textarea();
            case 'select':
				return new Select();
			case 'checkbox':
                return new Checkbox();
            default:
                throw new \Exception('Input não existente!');
        }
    }


}