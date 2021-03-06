<?php

class Controller {

    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function view( $view , $data = []) {
        require_once '../app/views/' . $view . '.html';
    }

    public function dto( $dto ) {
        require_once('../app/dto/' . $dto . '.php');
    }

    public function service($service) {
        require_once '../app/services/' . $service . '.php';
        return new CurrencyGeneratorService();
    }
}