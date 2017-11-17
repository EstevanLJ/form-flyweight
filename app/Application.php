<?php

namespace App;

class Application {


    public static function run() {

        $form = new Form('Exemplo de flyweight');

        $form->addField('text', 'Nome', 'Seu primeiro nome...', 6);
        $form->addField('text', 'Sobrenome', 'Seu segundo nome...', 12);

        $form->render();

    }

}