<?php
include_once $config["site"]["coreMVC"] . "router.php";

class Controller extends Router{

	private $controllerName = "";
	private $controllerPath = "";
	private $defaultRouterConfig = "";
	private $actionName = "";
    private $params = array();
	protected $globals;
	private $defaultActionName = "error";
	private $defaultControllerName = "error";

    public function __construct() {
		/********** 
		Propiedad globals = getInstance() de Globals
		**********/
		$config = $this->globals->get("config");

		/********** 
		Propiedad controllerPath = config->site->controllers 
		**********/


		/********** 
		Propiedad defaultRoutesConfig = config->site->configs . "routes.php"
		**********/


        $routesFile = $this->defaultRouterConfig;

		if(!file_exists($routesFile)) {
			throw new ControllerException("Router configuration file not found.");
		}


		/********** 
		$routes = incluir con require_once el fichero $routesFile 
		**********/

		if(!is_array($routes) || !array_key_exists("routes", $routes)) {
			throw new ControllerException("Invlid routes configuration file");
		}

		/********** 
		LLamar al método addRoutesFromFile pasándole como parámetro $routes
		**********/

	}

	private function setControllerName($controllerName) {
		if(!is_string($controllerName)) {
			throw new ControllerException("Invalid Controller Name.");
		}

		$this->controllerName = ucfirst(strtolower($controllerName)) . "Controller";
	}

	/**
	 * Sets the action full name.
	 *
	 * @param string $actionName The name of the action
	 */
	private function setActionName($actionName) {
		if(!is_string($actionName)) {
			throw new ControllerException("Invalid Action Name.");
		}

		$this->actionName = ucfirst(strtolower($actionName)) . "Action";
	}

	public function run() {
		if(($route = $this->parseUriRouter()) != null) {
			/********** 
			Llamar al método setControllerName con el parámetro $route->controller
			**********/

			/********** 
			Llamar al método setActionName con el parámetro $route->action
			**********/

		}

		else {
			$this->setControllerName($this->defaultControllerName);
			$this->setActionName($this->defaultActionName);
		}

		/********** 
		Llamar al método includeController con el parámetro controllerName
		**********/
		
		$controller = new $this->controllerName();
		$controller->run($this->actionName, $this);
	}

	private function includeController($controllerName) {
		$controllerFile = $this->controllerPath . $controllerName . ".php";

		if(!file_exists($controllerFile)) {
			throw new ControllerException("Controller file cannot be found");
		}

		require_once($controllerFile);
	}
}

