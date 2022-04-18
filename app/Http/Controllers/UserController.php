<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function loginAuth(Request $req)
    {
        $req->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        if (Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            $req->session()->regenerate();
            return redirect('/login')->with('success', 'Logged as ' . auth()->user()->name);
        } else {
            return redirect('/login')->with('error', 'Email or password incorrect.');
        }
    }

    public function register()
    {
        return view('user.register');
    }

    public function logout(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/login')->with('error', 'Logged out');
    }

    public function dashboard()
    {
        $user = User::find(auth()->user()->id);
        $user_products = $user->products;
        return view('user.dashboard', compact('user_products'));
    }

    public function cartStore(Request $req, int $id)
    {
        //session()->forget('cart');

        $cart = $req->session()->get('cart');
        if ($cart) {
            if (in_array($id, $cart)) {
                return redirect()->back()->with('error', 'This item is already in the cart.');
            }
        }
        
        $req->session()->push('cart', $id);
        
        return redirect()->back()->with('success', 'Item add to cart.');
    }

    public function cartUnset(Request $req, int $id) {
        $carts = $req->session()->get('cart');
        
        $key = array_search($id, $carts);
    
        unset($carts[$key]);
        
        $req->session()->put('cart', $carts);
        
        return redirect()->back()->with('success', 'Item delete from cart.');
    }

    public function store(StoreUserRequest $req)
    {
        $data = $req->all();
        $data['password'] = Hash::make($req->password);

        User::create($data);
        return redirect('/login')->with('success', 'Account created.');
    }
}
