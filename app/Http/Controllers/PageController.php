<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Response;
use Storage;

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

    public function getUpload($filename) {
        try {
            $file = Storage::get("uploads/$filename");
            $type = Storage::mimeType("uploads/$filename");
            return Response::make($file, 200)
                ->header('Content-Type', $type);
        } catch (FileNotFoundException $e) {
            return Response::make('Not found', 404);
        }

    }
}
