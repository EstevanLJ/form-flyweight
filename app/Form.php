<?php

namespace App;

use App\InputFactory;

class Form {

    protected $title;

    protected $fields;
	
	protected $submitButtonText = 'Submit';

    public function __construct($title) {
        
        $this->title = $title;

    }

    public function render() {
		switch (APPLICATION_THEME) {
            case 'bulma':
                $this->renderBulma();
                break;
            case 'bootstrap':
				$this->renderBootstrap();
                break;
            default:
                throw new \Exception('Tema não existente!');
        }
	}
	
	public function renderBulma() {
		echo('
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>' . $this->title . '</title>

				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
			</head>
			<body>
			<section class="section">
				<div class="container">
        ');

        foreach($this->fields as $field) {
            
            $input = InputFactory::build($field['type']);

            $input->render($field['state']);

		}
		
		echo('
			<div class="field">
				<div class="control">
					<button class="button is-link">' . $this->submitButtonText . '</button>
				</div>
			</div>
		');

        echo(' 
				</div>
			</section>
			</body>
			</html>
        ');
	}

	public function renderBootstrap() {
		echo('
			<html>
			<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>' . $this->title . '</title>

				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			</head>
			<body>
				<div class="container">
		');

		foreach($this->fields as $field) {
			
			$input = InputFactory::build($field['type']);

			$input->render($field['state']);

		}
		
		echo('
			<div class="row">
				<div class="col-xs-12">
					<button type="submit" class="btn btn-primary">' . $this->submitButtonText . '</button>
				</div>
			</div>
		');

		echo(' 
				</div>
			</body>
			</html>
		');
	}

    public function addField($inputType, $name, $displayName, $placeholder = '', $size = 12, $options = [], $tip = '') {

        $state = new State($name, $displayName, $placeholder, $size, $options, $tip);

        $this->fields[] = [
            'type' => $inputType,
            'state' => $state
        ];
	}
	
	public function setSubmitButtonText(String $newText) {

		$this->submitButtonText = $newText;

	}
}