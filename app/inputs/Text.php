<?php

namespace App\Inputs;

use App\State;

class Text implements InputInterface {

    protected $index;


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
                        <label class="label">' . $state->name . '</label>
                        <div class="control">
                            <input class="input" type="text" placeholder="' . $state->placeholder . '">
                        </div>
                        <p class="help">' . $state->tip . '</p>
                    </div>
                </div>
            </div>
        ');
    }

    public static function bootstrap(State $state) {
        echo('
            <div class="col-xs-' . $state->size . '">
                <div class="form-group">
                    <label class="control-label" for="inputSuccess1">' . $state->name . '</label>
                    <input type="text" class="form-control" id="inputSuccess1" placeholder="' . $state->placeholder . '">
                    <span id="helpBlock2" class="help-block">' . $state->tip . '</span>
                </div>
            </div>
        ');
    }



}