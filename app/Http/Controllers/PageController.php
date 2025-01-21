<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function electricity()
    {
        return view('electricity');
    }

    public function mobile()
    {
        return view('mobile');
    }

    public function gas()
    {
        return view('gas');
    }

    public function broadband()
    {
        return view('broadband');
    }

    public function loan()
    {
        return view('loan');
    }

    public function dth()
    {
        return view('dth');
    }

    public function wallet()
    {
        return view('wallet');
    }
}
