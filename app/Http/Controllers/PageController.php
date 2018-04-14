<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
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

    public function adminSettings() {
        return view('admin.settings');
    }

    public function changePassword(Request $request) {
        $oldpass = $request->get('oldpass');
        $newpass = $request->get('newpass');
        $chkpass = $request->get('chkpass');
        $user = Auth::user();

        if ($newpass == $chkpass && Hash::check($oldpass, $user->password)) {
            $user->password = Hash::make($newpass);
            $user->save();
        }

        return redirect()->route('admin.settings');
    }
}
