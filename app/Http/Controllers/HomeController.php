<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        if (auth('user')->check() && authUser()->role == 'user') {
            return redirect()->route('user.home');
        } elseif (auth('user')->check() && authUser()->role == 'approver') {

            return redirect()->route('approver.home');
        }

        return redirect('login');
    }
}
