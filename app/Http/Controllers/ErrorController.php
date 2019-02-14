<?php

namespace App\Http\Controllers;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class ErrorController extends Controller
{
    /**
     * @return string
     */
    public function error404()
    {
        return '404';
    }

    /**
     * @return string
     */
    public function error500()
    {
        return '500';
    }
}