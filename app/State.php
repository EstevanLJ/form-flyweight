<?php

namespace App;


class State {

	public $name;
	
	public $displayName;

    public $size;

    public $placeholder;

    public $options;

    public $tip;

    public function __construct($name, $displayName, $placeholder = '', $size = 12 , $options = [], $tip = '') {
		
		$this->name = $name;

		$this->displayName = $displayName;
		
		$this->size = $size;
		
		$this->placeholder = $placeholder;
		
		$this->options = $options;

		$this->tip = $tip;
		
    }

}