<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Auth;
class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
}
