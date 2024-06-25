<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LotController extends Controller
{
    public function index()
    {
        return view('proprietaire.lot');
    }
}
