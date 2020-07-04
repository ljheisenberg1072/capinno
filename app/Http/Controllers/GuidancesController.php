<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuidancesController extends Controller
{
    public function index()
    {
        return view('guidances.index');
    }
}
