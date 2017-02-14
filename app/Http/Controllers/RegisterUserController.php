<?php

namespace App\Http\Controllers;

use App\Events\NewRegisteredUserEvents;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function register()
    {
        event(new NewRegisteredUserEvents());
    }
}
