<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rundown;

class LocationController extends Controller
{
    public function index()
    {
        $rundowns=Rundown::all();

        $data = array(
            "indexPage" => "Location",
            'rundowns' => $rundowns
        );


        return view("location")->with($data);
    }
}
