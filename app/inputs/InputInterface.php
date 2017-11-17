<?php

namespace App\Inputs;

use App\State;

interface InputInterface {


    public static function render(State $state);


}