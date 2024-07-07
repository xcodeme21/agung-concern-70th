<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller; 
use App\Models\User;
use Validator, Auth; 
use Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginAdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    public function index(Request $request) {
        $data = array(
            "indexPage" => "Login"
        );

        return view("admin.login")->with($data);
    }
 
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "username" => "required",
            "password" => "required"
        ]);

        if ($validator->fails()) {
            $data = [
                "data" => null,
                "error_message" => $validator->errors()->first(),
                "status" => 400,
            ];
            return response()->json($data, 400);
        }

        $username=strtolower($request['username']);
        $password=$request['password'];

        $user=User::where('username',$username)->first();

        if($user === null) {
            $data = [
                "data" => null,
                "error_message" => "User not found",
                "status" => 404,
            ];
            return response()->json($data, 404);
        } else {
            $password = md5($password);
            if($password != $user->password) {
                $data = [
                    "data" => null,
                    "error_message" => "Password incorrect",
                    "status" => 400,
                ];
                return response()->json($data, 400);
            }

            $data = [
                "data" => $user,
                "error_message" => null,
                "status" => 200,
            ];
            return response()->json($data, 200);
        }

    }

    public function logout(Request $request)
	{
        Auth::logout();
        notify()->success('Logout berhasil. Sampai jumpa kembali.');
		return redirect('/login'); 
    }
}