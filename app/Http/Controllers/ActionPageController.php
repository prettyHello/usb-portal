<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActionPageController extends AuthController
{
    public function get()
    {
        return view("actions");
    }
}
