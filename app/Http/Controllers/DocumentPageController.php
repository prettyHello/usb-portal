<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentPageController extends Controller
{
    public function get()
    {
        return view("documents");
    }
}
