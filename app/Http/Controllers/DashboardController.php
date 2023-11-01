<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $data['products'] = [];
        $data['prods'] = [];
        $data['services'] = Services::all()->count();
        $data['users'] = User::all()->count();
        $data['transactions'] = [];
        $data['page_open'] = 'dashboard';
        $data['page_title'] = 'dashboard';
        $data['user'] = Auth::user();

        return view('admin.dashboard', $data);
    }
}
