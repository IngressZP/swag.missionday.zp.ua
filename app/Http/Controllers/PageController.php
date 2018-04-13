<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return view('index');
    }

    public function login() {
        return view('admin.login');
    }

    public function adminIndex() {
        return view('admin.index');
    }
}
