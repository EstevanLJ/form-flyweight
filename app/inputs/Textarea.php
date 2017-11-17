<?php

namespace App\Inputs;

use App\State;

class Textarea implements InputInterface {

	public static function render(State $state) {
        switch (APPLICATION_THEME) {
            case 'bulma':
                self::bulma($state);
                break;
            case 'bootstrap':
                self::bootstrap($state);
                break;
            default:
                throw new \Exception('Tema não existente!');
        }
    }

    public static function bulma(State $state) {
        echo('
            <div class="columns">
                <div class="column is-' . $state->size . '">
                    <div class="field">
                        <label class="label">' . $state->displayName . '</label>
                        <div class="control">
                            <textarea class="textarea" name="' . $state->name . '" placeholder="' . $state->placeholder . '"></textarea>
                        </div>
                        <p class="help">' . $state->tip . '</p>
                    </div>
                </div>
            </div>
        ');
    }

    public static function bootstrap(State $state) {
		echo('
			<div class="row">
				<div class="col-xs-' . $state->size . '">
					<div class="form-group">
						<label class="control-label">' . $state->displayName . '</label>
						<textarea rows="5" name="' . $state->name . '" class="form-control" placeholder="' . $state->placeholder . '"></textarea>
						<span class="help-block">' . $state->tip . '</span>
					</div>
				</div>
            </div>
        ');
    }

    
}