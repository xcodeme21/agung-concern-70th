<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller; 
use App\Models\User;
use App\Models\Attedance;
use Validator, Auth; 
use Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
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
        if(Auth::check()) {
            return redirect('//dashboard');
        }
        
        $data = array(
            "indexPage" => "Login"
        );

        return view("auth.login")->with($data);
    }
 
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "phonenumber" => "required"
        ]);

        if ($validator->fails()) {
            $data = [
                "data" => null,
                "error_message" => $validator->errors()->first(),
                "status" => 400,
            ];
            return response()->json($data, 400);
        }

        $phonenumber = $request['phonenumber'];
        
        $phonenumber = preg_replace('/[^0-9-]/', '', $phonenumber);
        
        if (strlen($phonenumber) > 14) {
            $data = [
                "data" => null,
                "error_message" => "Nomor telepon tidak boleh lebih dari 14 karakter.",
                "status" => 400
            ];
        
            return response()->json($data, 400);
        }
        
        if (substr($phonenumber, 0, 1) !== '0') {
            $phonenumber = '0' . $phonenumber;
        }

        $check=Attedance::where('phonenumber', $phonenumber)->first();

        if($check == null) {
            $data = [
                "data" => null,
                "error_message" => "Attedance not found",
                "status" => 404,
            ];
            return response()->json($data, 404);
        }

        $data = [
            "data" => $check,
            "error_message" => null,
            "status" => 200,
        ];
        return response()->json($data, 200);

    }

    public function logout(Request $request)
	{
        Auth::logout();
        notify()->success('Logout berhasil. Sampai jumpa kembali.');
		return redirect('/login'); 
    }
}