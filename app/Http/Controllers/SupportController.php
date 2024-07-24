<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        $support1 = [
            'name' => 'Alassane GUEYE',
            'email' => 'alassane.gueye@terraplus.com',
            'phone' => '(+221) 78 254 21 85',
            'specialty' => 'Support technique général'
        ];

        $support2 = [
            'name' => 'Adrien Diong GOMIS',
            'email' => 'adrien.gomis@terraplus.com',
            'phone' => '(+221) 78 483 35 52',
            'specialty' => 'Support logiciel spécialisé'
        ];

        return view('support.index', compact('support1', 'support2'));
    }
}
