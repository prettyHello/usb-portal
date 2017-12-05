<?php
/**
 * Created by PhpStorm.
 * User: franckfadeur
 * Date: 7/11/17
 * Time: 8:30 PM
 */

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
