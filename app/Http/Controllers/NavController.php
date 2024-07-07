<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class NavController extends Controller
{
    public function index($locale)
    {
        session(['locale' => $locale]);
        return redirect()->back();
    }
}
