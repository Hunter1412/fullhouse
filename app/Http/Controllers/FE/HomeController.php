<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class HomeController extends Controller
{
    public function home()
    {
        $product_sale = Product::where('discount', '>', 0)->get();
        $product_latest = Product::orderByDesc('updated_at')->get();
        return view('fe.home', [
            'product_sale' => $product_sale,
            'product_latest' => $product_latest
        ]);
    }

    public function about()
    {
        return view('fe.about');
    }

    public function contact()
    {
        return view('fe.contact');
    }

    public function cart()
    {
        return view('fe.cart');
    }

    public function checkout()
    {
        return view('fe.checkout');
    }

    public function login()
    {
        return view('fe.login');
    }

    public function checkLogin(Request $request)
    {
        $email = $request->email;
        $pwd = $request->password;

        $user = Employee::where('email', $email)->first();
        if ($user != null && $user->password == $pwd) {
            if ($user->role == 1) {
                return redirect('fe.home');
            } else {
                return redirect('admin');
            }
        } else {
            return redirect('login');
        }
    }

    public function register()
    {
        return view('fe.register');
    }
    
    public function RegisterAcc(LoginRequest $request)
    {
        $item = $request->all();
        $user = new User();
        $user->name = $item->name;
        $user->email = $item->email;
        $user->phone = $item->phone;
        $user->password = $item->password;
        $user->save();
        
        return redirect('/fe');
    }

    public function register_socialite()
    {
        return view('fe.register_socialite');
    }

}