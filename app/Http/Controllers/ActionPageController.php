<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActionPageController extends Controller
{
    public function get()
    {
        return view("actions");
    }
}
