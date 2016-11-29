<?php

namespace Larashop\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view ('welcome');
    }
}
