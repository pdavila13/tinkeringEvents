<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function register()
    {
        event(new Registered());
    }
}
