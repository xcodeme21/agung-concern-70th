<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rundown;

class AboutController extends Controller
{
    public function index()
    {
        $rundowns=Rundown::all();

        $data = array(
            "indexPage" => "About",
            'rundowns' => $rundowns
        );


        return view("about")->with($data);
    }
}
