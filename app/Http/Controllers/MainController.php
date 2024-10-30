<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // Mostra la homepage
    public function index()
    {
        return view('welcome');
    }

    public function dashboard()
    {
        return view('admin.dashboard'); 
    }
}