<?php

namespace App\Inputs;

use App\State;
use App\Application;

class Checkbox implements InputInterface {

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
						<div class="control">
							<label class="checkbox">
								<input type="checkbox" name="' . $state->name . '">
								' . $state->displayName . '
							</label>
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
						<div class="checkbox">
							<label>
								<input type="checkbox" name="' . $state->name . '">
								' . $state->displayName . '
							</label>
						</div>
					</div>
				</div>
            </div>
        ');
    }



}