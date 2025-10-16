<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class MainController extends Controller
{
    public function main()
    {return redirect(to:'dashboard');}
    
     
    public function dashboard()
    {
     $last_application = auth()->user()->applications()->latest()->first();
    
    return view('dashboard')->with([    
        'applications'=> Application::latest()->paginate(10),
    ]);
    }
}
