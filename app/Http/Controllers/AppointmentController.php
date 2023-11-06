<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = ['page_title' => 'appointment'];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function pending()
    {
        $this->data['page_open'] = 'pending';
        $this->data['user'] = Auth::user();
        return view('admin.pending', $this->data);
    }

    public function approved()
    {
        $this->data['page_open'] = 'approved';
        $this->data['user'] = Auth::user();
        return view('admin.approved', $this->data);
    }

    public function canceled()
    {
        $this->data['page_open'] = 'canceled';
        $this->data['user'] = Auth::user();
        return view('admin.canceled', $this->data);
    }

    public function completed()
    {
        $this->data['page_open'] = 'completed';
        $this->data['user'] = Auth::user();
        return view('admin.completed', $this->data);
    }

    public function getallpending()
    {

        $user = User::where('id', Auth::user()->id)->get()[0];
        $pending = Appointment::with('user')->where('status', 0)->where('user_id', $user->id)->get();
        if ($user->hasRole('Admin')) {
            $pending = Appointment::with('user')->where('status', 0)->get();
        }

        $response['data'] = $pending;

        return response()->json($response);
    }

    public function getallapproved()
    {

        $user = User::where('id', Auth::user()->id)->get()[0];
        $approved = Appointment::with('user')->where('status', 1)->where('user_id', $user->id)->get();
        if ($user->hasRole('Admin')) {
            $approved = Appointment::with('user')->where('status', 1)->get();
        }

        $response['data'] = $approved;

        return response()->json($response);
    }

    public function getallcanceled()
    {

        $user = User::where('id', Auth::user()->id)->get()[0];
        $canceled = Appointment::with('user')->where('status', 2)->where('user_id', $user->id)->get();
        if ($user->hasRole('Admin')) {
            $canceled = Appointment::with('user')->where('status', 2)->get();
        }

        $response['data'] = $canceled;

        return response()->json($response);
    }

    public function getallcompleted()
    {

        $user = User::where('id', Auth::user()->id)->get()[0];
        $completed = Appointment::with('user')->where('status', 3)->where('user_id', $user->id)->get();
        if ($user->hasRole('Admin')) {
            $completed = Appointment::with('user')->where('status', 3)->get();
        }

        $response['data'] = $completed;

        return response()->json($response);
    }

    public function store(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                "date" => "required|after_or_equal:" . date('m/d/Y')
            ], ['date.required' => 'Date is required', 'date.after' => 'Please input a valid date']);

            if ($validate->fails()) {
                return response()->json(['status' => 400, 'error' => $validate->getMessageBag()]);
            } else {

                $appointments = Appointment::whereDate('created_at', $request->date)->get();
                if (count($appointments) > 10) {
                    return response()->json(['status' => 405, 'asd' => $appointments]);
                }
                try {

                    $appointment = Appointment::create([
                        'user_id' => Auth::user()->id,
                        'status' => 0,
                    ]);

                    if ($appointment) {
                        return response()->json(['status' => 200, 'msg' => 'Inserted Succesfully'], 200);
                    } else {
                        return response()->json(['status' => 500, 'msg' => 'Invalid query.'], 500);
                    }
                } catch (\Exception $e) {
                    abort(500, 'Something Went Wrong!!');
                }
            }
        } catch (\Exception $e) {
            abort(500, 'Something Went Wrong');
        }
    }

    public function select(Request $request)
    {
        $id = $request->id;
        $appointment = Appointment::where('id', $id)->get();

        if (count($appointment)) {
            $data['id'] = $id;
            $data['data'] = $appointment;
            return response()->json($data, 200);
        } else {
            return response()->json(['msg' => 'Bad request. ID is not found.'], 400);
        }
    }

    public function approve(Request $request)
    {
        try {
            $appointment = Appointment::where('id', $request->id)->update(['status' => 1]);

            if ($appointment) {
                return response()->json(['status' => 200, 'msg' => 'Updated Succesfully', 'data' => $request->all()]);
            } else {
                return response()->json(['status' => 500, 'msg' => 'Invalid query.'], 500);
            }
        } catch (\Exception $e) {
            abort(500, 'Something Went Wrong');
        }
    }
    public function cancel(Request $request)
    {
        try {

            $appointment = Appointment::where('id', $request->id)->update(['status' => 2]);

            if ($appointment) {
                return response()->json(['status' => 200, 'msg' => 'Updated Succesfully', 'data' => $request->all()]);
            } else {
                return response()->json(['status' => 500, 'msg' => 'Invalid query.'], 500);
            }
        } catch (\Exception $e) {
            abort(500, 'Something Went Wrong');
        }
    }

    public function complete(Request $request)
    {
        try {

            $appointment = Appointment::where('id', $request->id)->update(['status' => 3]);

            if ($appointment) {
                return response()->json(['status' => 200, 'msg' => 'Updated Succesfully', 'data' => $request->all()]);
            } else {
                return response()->json(['status' => 500, 'msg' => 'Invalid query.'], 500);
            }
        } catch (\Exception $e) {
            abort(500, 'Something Went Wrong');
        }
    }
}
