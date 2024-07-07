<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller; 
use App\Models\Attedance;

class AdminController extends Controller
{
    public function index(Request $request) {
        $data = array(
            "indexPage" => "Dashboard"
        );

        return view("admin.dashboard")->with($data);
    }

    public function attendances(Request $request) {
        $antendances=Attedance::all();
        $totalRegister=Attedance::count();
        $totalClaim=Attedance::where('confirmation', true)->count();

        $data = array(
            "indexPage" => "Attendances",
            "antendances" => $antendances,
            "totalRegister" => $totalRegister,
            "totalClaim" => $totalClaim
        );

        return view("admin.attendances")->with($data);
    }
    
    public function qr(Request $request) {
        $data = array(
            "indexPage" => "Dashboard"
        );

        return view("admin.qr")->with($data);
    }
    
    public function detail($queue) {
        $attendance=Attedance::where('queue', $queue)->first();


        $update=Attedance::where('queue', $queue)->update(
            [
                'confirmation' => 1,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        $data = array(
            "indexPage" => "Detail",
            'attendance' => $attendance
        );

        return view("admin.detail")->with($data);
    }
}