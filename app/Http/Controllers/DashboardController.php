<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {

        toast('Selamat Datang ' . Auth::user()->name, 'success');
        return view('dashboard.index');
    }
}
