<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rundown;

class RundownController extends Controller
{
    public function index()
    {
        $rundowns=Rundown::all();

        $data = array(
            "indexPage" => "Rundown",
            'rundowns' => $rundowns
        );


        return view("rundown")->with($data);
    }
}
