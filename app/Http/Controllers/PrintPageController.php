<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintPageController extends AuthController
{
    public function get()
    {
        return view("print");
    }
}
