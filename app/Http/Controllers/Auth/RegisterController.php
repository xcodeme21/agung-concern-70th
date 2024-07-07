<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth, Validator;
use App\Models\Company;
use App\Models\Attedance;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Mail\CustomerMail;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    use AuthenticatesUsers;


    public function index(Request $request) {
        if(Auth::check()) {
            return redirect('//dashboard');
        }

        $companies=Company::orderBy('company_name', 'ASC')->get();
        
        $data = array(
            "indexPage" => "Register",
            'companies' => $companies
        );

        return view("auth.register")->with($data);
    }

    public function registration(Request $request) {
        $validator = Validator::make($request->all(), [
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|email",
            "phonenumber" => "required",
            "company_name" => "required",
            "food_preferences" => "required",
            "attend" => "required",
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
        $email = strtolower($request['email']);
        
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
        
        $attend=$request["attend"] === "1" ? 1 : 0 ;

        $checkPhone=Attedance::where('phonenumber', $phonenumber)->first();
        $checkEmail=Attedance::where('email', $email)->first();

        if($checkPhone != null || $checkEmail != null) {
            $data = [
                "data" => null,
                "error_message" => "User telah terdaftar.",
                "status" => 400
            ];
    
    
            return response()->json($data, 400);
        }

        $count = Attedance::count();
        if ($count === 0) {
            $queue = "00001";
        } else {
            $maxQueue = Attedance::max('queue');
            $nextNumber = intval($maxQueue) + 1;
            $queue = str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
        }

        $insert = Attedance::create([
            "firstname" => ucwords($request["firstname"]),
            "lastname" => ucwords($request["lastname"]),
            "email" => $email,
            "phonenumber" => $phonenumber,
            "company_name" => $request["company_name"],
            "food_preferences" => $request["food_preferences"],
            "attend" => $attend,
            "queue" => $queue,
        ]);

        $insertedData = Attedance::find($insert->id);

        QrCode::size(250)->generate($queue, public_path('qrcodes/'.$queue.'.svg') );

        $this->sendMail($insertedData);

        $data = [
            "data" => $insertedData,
            "error_message" => null,
            "status" => 200
        ];


        return response()->json($data, 200);
        
    }

    public function sendMail($customerData)
    {
        Mail::to($customerData['email'])->send(new CustomerMail($customerData));
    }
}
