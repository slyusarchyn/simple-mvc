<?php

namespace App\Http\Controllers;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HelloController extends Controller
{
    public function index()
    {
        return $this->render('hello');
    }
}