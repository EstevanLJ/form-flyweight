<?php

namespace App;


class State {

    public $name;

    public $size;

    public $placeholder;

    public $options;

    public $tip;

    public function __construct($name, $placeholder = '', $size = 12 , $options = [], $tip = '') {
        $this->name = $name;
        $this->size = $size;
        $this->placeholder = $placeholder;
        $this->options = $tip;
    }


}