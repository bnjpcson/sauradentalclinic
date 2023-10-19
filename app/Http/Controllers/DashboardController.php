<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $data['products'] = [];
        $data['prods'] = [];
        $data['totalearnings'] = 100;
        $data['totalproducts'] = 100;
        $data['transactions'] = [];
        $data['page_open'] = 'dashboard';
        $data['page_title'] = 'dashboard';

        return view('admin.dashboard', $data);
    }
}
