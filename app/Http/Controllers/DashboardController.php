<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function retourneViewDashboard()
    {
        if(Auth::check())
        {
            return view('dashboard');
        }
        return redirect('authentication/connexion');
    }
}
