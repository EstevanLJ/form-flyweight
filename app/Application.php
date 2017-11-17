<?php

namespace App;

class Application {


    public static function run() {

		$paises = [
			['key' => 1, 'value' => 'Brasil'],
			['key' => 2, 'value' => 'Argentina'],
			['key' => 3, 'value' => 'Uruguai'],
			['key' => 4, 'value' => 'Paraguai'],
			['key' => 5, 'value' => 'Chile']
		];

		$form = new Form('Exemplo de flyweight');
		$form->setSubmitButtonText('Enviar');

        $form->addField('text', 'first_name', 'Nome', 'Seu primeiro nome...', 6);
        $form->addField('text', 'last_name', 'Sobrenome', 'Seu segundo nome...', 6);
        $form->addField('text', 'email', 'E-mail', 'E-mail para contato', 6, [], 'Tenha certeza que você tem acesso a este e-mail!');;
        $form->addField('select', 'country', 'País de origem', '', 2, $paises, 'Selecione o país');

        $form->render();

    }

}