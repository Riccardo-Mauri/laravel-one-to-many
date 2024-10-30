<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        $projects = Project::all(); // Recupera tutti i progetti
        return view('admin.dashboard', compact('projects'));
    }

}
