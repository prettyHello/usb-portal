<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintPageController extends Controller
{
    public function get()
    {
        return view("print");
    }
}
