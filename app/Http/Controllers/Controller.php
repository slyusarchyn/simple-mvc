<?php

namespace App\Http\Controllers;

use App;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller
{

    public $layoutFile = 'views/layout/app.php';

    public function renderLayout($body)
    {
        ob_start();
        require ROOTPATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'layout' . DIRECTORY_SEPARATOR . "app.php";

        return ob_get_clean();
    }

    public function render($viewName, array $params = [])
    {
        $viewFile = ROOTPATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $viewName . '.php';
        extract($params);
        ob_start();
        require $viewFile;
        $body = ob_get_clean();
        ob_end_clean();
        if (defined(NO_LAYOUT)) {
            return $body;
        }

        return $this->renderLayout($body);
    }

}