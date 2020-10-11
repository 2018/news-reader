<?php

namespace App\Http\Controllers;

use Response;

class AdminController extends Controller
{

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
