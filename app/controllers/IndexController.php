<?php
$this->globals = Globals::getInstance();
$config = $this->globals->get("config");
include_once $config["site"]["coreMVC"] . "action.php";

class IndexController extends Action {

    public function IndexAction() {
        $config = $this->globals->get("config");
        /********** 
        Añadir el fichero config->site->views . "portada.php" con include_once
        **********/
        
    }
}