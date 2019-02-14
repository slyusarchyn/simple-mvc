<?php

namespace App\Http;

use App;
use App\Exceptions\InvalidRouteException;

/**
 * Class Kernel
 * @package App\Http
 */
class Kernel
{

    public $defaultControllerName = 'HomeController';

    public $defaultActionName = "index";

    public function launch()
    {
        list($controllerName, $actionName, $params) = App::$router->resolve();
        echo $this->launchAction($controllerName, $actionName, $params);
    }

    /**
     * @param $controllerName
     * @param $actionName
     * @param $params
     * @return mixed
     * @throws InvalidRouteException
     */
    public function launchAction($controllerName, $actionName, $params)
    {
        $controllerName = empty($controllerName) ? $this->defaultControllerName : ucfirst($controllerName) . 'Controller';
        if (!file_exists(ROOTPATH . DIRECTORY_SEPARATOR . 'app/Http/Controllers' . DIRECTORY_SEPARATOR . $controllerName . '.php')) {
            throw new InvalidRouteException();
        }
        require_once ROOTPATH . DIRECTORY_SEPARATOR . 'app/Http/Controllers' . DIRECTORY_SEPARATOR . $controllerName . '.php';
        if (!class_exists("\\App\Http\Controllers\\" . ucfirst($controllerName))) {
            throw new InvalidRouteException();
        }
        $controllerName = "\\App\Http\Controllers\\" . ucfirst($controllerName);
        $controller = new $controllerName;
        $actionName = empty($actionName) ? $this->defaultActionName : $actionName;
        if (!method_exists($controller, $actionName)) {
            throw new InvalidRouteException();
        }

        return $controller->$actionName($params);
    }

}