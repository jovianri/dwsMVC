<?php

abstract class Action
{
    protected $globals;

    public function run($action) {
        $this->globals = Globals::getInstance();
		$this->$action();
    }
    
}
