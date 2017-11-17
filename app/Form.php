<?php

namespace App;

use App\InputFactory;

class Form {

    protected $title;

    protected $fields;

    protected $factory;

    public function __construct($title) {
        
        $this->title = $title;

        $this->factory = new InputFactory();

    }

    public function render() {
        echo('
        <html>
            <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>' . $this->title . '</title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.1/css/bulma.min.css">
            </head>
        <body>
        <section class="section">
        <div class="container">
        ');

        foreach($this->fields as $field) {
            
            $input = $this->factory->build($field['type']);

            $input->render($field['state']);

        }

        echo(' 
        </div>
        </section>
        </body>
        </html>
        ');

    }

    public function addField($input, $name,  $placeholder = '', $size = 12, $options = [], $tip = '') {

        $state = new State($name, $placeholder, $size, $options, $tip);

        $this->fields[] = [
            'type' => $input,
            'state' => $state
        ];
    }
}