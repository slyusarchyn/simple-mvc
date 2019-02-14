<?php

namespace App\Http\Controllers;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HelloController extends Controller
{
    /**
     * @return false|string
     */
    public function index()
    {
        return $this->render('hello');
    }
}