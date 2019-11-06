<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Home controller
 */
class IndexController extends Controller
{
    /**
     * Homepage action
     * 
     * @param Request $request Request object
     * 
     * @return View
     */
    public function home(Request $request)
    {
        return view('welcome');
    }
}
