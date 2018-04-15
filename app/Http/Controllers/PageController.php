<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Response;
use Storage;
use App\Models\Category;
use App\Models\Product;

class PageController extends Controller
{
    public function index(Request $request) {
        if ($request->has('category')) {
            $category = $request->get('category');
            $products = Product::where('category_id', $category)->get();
        } else {
            $category = 0;
            $products = Product::all();
        }

        return view('index', [
            'category' => $category,
            'cats' => Category::all(),
            'products' => $products,
        ]);
    }

    public function login() {
        return view('admin.login');
    }

    public function adminIndex() {
//        return view('admin.index');
        return redirect()->route('admin.orders.index');
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

        if ($newpass == $chkpass) {
            if(Hash::check($oldpass, $user->password)) {
                $user->password = Hash::make($newpass);
                $user->save();
                $message = 'Пароль успешно изменен';
            } else {
                $message = 'Неправильный пароль';
            }
        } else {
            $message = 'Пароли не совпадают';
        }

        $request->session()->flash('status', $message);

        return redirect()->route('admin.settings');
    }
}
