<?php

namespace App\Http\Controllers;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @return false|string
     */
    public function index()
    {
        return $this->render('home');
    }
}