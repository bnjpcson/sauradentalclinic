<?php

namespace App\Http\Controllers;

use App\Models\Medhistory;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index()
    {
        $data['page_open'] = 'profile';
        $data['page_title'] = 'profile';
        $data['user'] = Auth::user();

        return view('admin.profile', $data);
    }

    public function changepass(Request $request)
    {
        $user = Auth::user();
        try {
            $validate = Validator::make($request->all(), [
                "oldpassword" => "required",
                "newpassword" => "required",
                "confirmpassword" => "required",
            ]);

            if ($validate->fails()) {
                return response()->json(['status' => 400, 'error' => $validate->getMessageBag()]);
            } else {
                $errors = [];
                if(!Hash::check($request->oldpassword, $user->password)){
                    $errors['oldpassword'] = ['Incorrect Old Password'];
                }
                if($request->newpassword != $request->confirmpassword){
                    $errors['newpassword'] = ['Two passwords do not match.'];
                }
                if(!empty($errors)){
                    return response()->json(['status' => 400, 'error' => $errors, 'check' => Hash::check($request->oldpassword, $user->password)]);
                }
                try {

                    $user = User::where('id', $user->id)->update(['password'=> Hash::make($request->newpassword)]);

                    if ($user) {
                        return response()->json(['status' => 200, 'msg' => 'Updated Succesfully', 'data' => $request->all()]);
                    } else {
                        return response()->json(['status' => 500, 'msg' => 'Invalid query.'], 500);
                    }
                } catch (\Exception $e) {
                    abort(500, 'Something Went Wrong' . $e);
                }
            }
        } catch (\Exception $e) {
            abort(500, 'Something Went Wrong');
        }
    }

    public function update(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                "id" => "required",
                "name" => "required",
                "email" => "required|unique:users,email," . $request->id."|bail",
                "bdate" => "required|date|bail",
                "phonenum" => "required|numeric|digits:11|bail",
            ],[
                'id.required' => 'ID is required',
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.unique' => 'This email is already taken.',
                'bdate.required' => 'Birth Date is required',
                'bdate.date' => 'Please input a valid date',
                'phonenum.required' => 'Phone number is required',
                'phonenum.numeric' => 'Please input a valid phone number',
                'phonenum.digits' => 'Please input a valid phone number',
            ]);

            if ($validate->fails()) {
                return response()->json(['status' => 400, 'error' => $validate->getMessageBag(), 'data' => $request->all()]);
            } else {
                try {
                    $id = $request->id;

                    $user = User::where('id', $id)->get()[0];
                    $user->syncRoles($request->role);
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->phonenum = $request->phonenum;
                    $user->bdate = $request->bdate;
                    $user->save();

                    if ($user) {
                        return response()->json(['status' => 200, 'msg' => 'Updated Succesfully', 'data' => $request->all()]);
                    } else {
                        return response()->json(['status' => 500, 'msg' => 'Invalid query.'], 500);
                    }
                } catch (\Exception $e) {
                    abort(500, 'Something Went Wrong' . $e);
                }
            }
        } catch (\Exception $e) {
            abort(500, 'Something Went Wrong');
        }
    }

    public function getuser(Request $request){
        try{
            $data = Auth::user();
            return response()->json(['status' => 200, 'data' => $data], 200);
        }catch(\Exception $e){
            abort(500, 'Something Went Wrong');
        }
    }

    
    public function getmedhistory(Request $request){
        try{
            $data = Medhistory::join('questions', 'medhistory.question_id', '=', 'questions.id')->where('user_id', Auth::user()->id)->get();
            return response()->json(['status' => 200, 'data' => $data], 200);
        }catch(\Exception $e){
            abort(500, 'Something Went Wrong');
        }
    }
}
