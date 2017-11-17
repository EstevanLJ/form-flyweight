<?php

namespace App\Inputs;

use App\State;
use App\Application;

class Select implements InputInterface {

	public static function render(State $state) {
        switch (Application::$APPLICATION_THEME) {
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
							<div class="select is-fullwidth">
								<select name="' . $state->name . '">
		');

		foreach($state->options as $option) {
			echo('<option value="' . $option['key'] . '">' . $option['value'] . '</option>');
		}

		echo('						
								</select>
							</div>
						</div>
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
						<select class="form-control" name="' . $state->name . '">
		');

		foreach($state->options as $option) {
			echo('<option value="' . $option['key'] . '">' . $option['value'] . '</option>');
		}

		echo('						
						</select>
						<span  class="help-block">' . $state->tip . '</span>
					</div>
				</div>
			</div>
		');
    }


}