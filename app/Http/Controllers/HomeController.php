<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                return view('dashboard');
            } elseif ($usertype == 'technicien') {
                return view('tech.technicienhome');
            } else {
                // Redirect to a default page or handle the error
                return view('error');
            }
        } else {
            // Redirect to login page or handle the case when no user is logged in
            return redirect()->route('login');
        }
    }
}
