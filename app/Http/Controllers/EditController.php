<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function edit() {
        return view('edit.edit');
    }
}
