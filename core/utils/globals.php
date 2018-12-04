<?php

class Globals {
	/********** 
	Definir 2 variables: 
		-$globals de tipo array
		-$instance inicializada a null
	**********/
	public $globals = [];
	public $instance = null;

	/********** 
	 Función getInstance(): 
		 -Tiene que ser accesible sin crear ningún objeto
		 -Comprobará si la variable $instance es null, si lo es creará un nuevo
			 objeto de tipo Globals
		- Devolverá la variable $instance
	**********/
	public static function getInstance() {
		if ($instance === null) {
			$this->$instance = new Globals;
		}
		return $instance;
	}

	/********** 
	 Función set($key, $value): 
		 -Añadirá $value al array globals con la clave $key (globals[$key] = $value)
	**********/
	public function set($key, $value) {
		$globals[$key] = $value;
	}

	/********** 
	 Función get($key): 
		 -Devolverá el valor de globals[$key], o null si no existe $key en el array
	**********/
	public function get($key) {
		if (array_key_exists ($key, $globals)) {
			return $globals[$key];
		}
		return null;
	}
}