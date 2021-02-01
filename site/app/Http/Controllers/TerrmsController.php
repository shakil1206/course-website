<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerrmsController extends Controller
{
    public function TermsPage()
    {
        return view('terms');
    }
}
