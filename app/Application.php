<?php

namespace App;

class Application {

	public static $APPLICATION_THEME = 'bulma';

    public static function run() {


		if(isset($_GET['theme'])) {
			self::$APPLICATION_THEME = $_GET['theme'];
		}

		$countries = [
			['key' => 1, 'value' => 'Brasil'],
			['key' => 2, 'value' => 'Argentina'],
			['key' => 3, 'value' => 'Uruguai'],
			['key' => 4, 'value' => 'Paraguai'],
			['key' => 5, 'value' => 'Chile'],
			['key' => 6, 'value' => 'Outro']
		];

		$genders = [
			['key' => 1, 'value' => 'Masculino'],
			['key' => 2, 'value' => 'Feminino'],
			['key' => 3, 'value' => 'Indefinido']
		];

		$form = new Form('Formulário Exemplo');
		$form->setSubmitButtonText('Enviar');

        $form->addField('text', 'first_name', 'Nome', 'Seu primeiro nome...', 6);
        $form->addField('text', 'last_name', 'Sobrenome', 'Seu segundo nome...', 6);
        $form->addField('select', 'gender', 'Gênero', '', 3, $genders, 'Selecione o seu gênero');
        $form->addField('checkbox', 'age', 'Declaro que tenho acima de 18 anos');
        $form->addField('text', 'email', 'E-mail', 'E-mail para contato', 6, [], 'Tenha certeza que você tem acesso a este e-mail!');;
        $form->addField('select', 'country', 'País de origem', '', 3, $countries, 'Selecione o país');
        $form->addField('textarea', 'comment', 'Comentário', '', 12, [], 'Deixa aqui o seu comentário sobre o assunto');
        $form->addField('checkbox', 'accept', 'Concordo com as regras do forúm');

        $form->render();

    }

}