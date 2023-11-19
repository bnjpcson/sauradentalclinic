<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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

    public function index()
    {

        if (Auth::user()->getRoleNames()[0] == "Admin") {
            $data['services'] = Services::all()->count();
            $data['users'] = User::all()->count();
            $data['pending'] = Appointment::all()->where('status', '0')->count();
            $data['scheduled'] = Appointment::all()->where('status', '1')->count();
            $data['canceled'] = Appointment::all()->where('status', '2')->count();
            $data['completed'] = Appointment::all()->where('status', '3')->count();
        } else {
            $data['services'] = Services::all()->count();
            $data['users'] = User::all()->count();

            $data['pending'] = Appointment::all()
                ->where('status', '0')
                ->where('user_id', Auth::user()->id)
                ->count();

            $data['scheduled'] = Appointment::all()
                ->where('status', '1')
                ->where('user_id', Auth::user()->id)
                ->count();

            $data['canceled'] = Appointment::all()
                ->where('status', '2')
                ->where('user_id', Auth::user()->id)
                ->count();

            $data['completed'] = Appointment::all()
                ->where('status', '3')
                ->where('user_id', Auth::user()->id)
                ->count();
        }

        $data['page_open'] = 'dashboard';
        $data['page_title'] = 'dashboard';
        $data['user'] = Auth::user();

        return view('admin.dashboard', $data);
    }
}
