<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComposeController extends Controller
{
    public function index()
    {
        return view('create');
    }
    public function send(Request $request)
    {
        $payload = $request->all();
        dd($payload);
        // return view('compose');
    }
    
}
