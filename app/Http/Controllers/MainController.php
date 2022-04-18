<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $consoles = Product::where('category', 'console')->limit(3)->orderBy('id', 'desc')->get();
        $games = Product::where('category', 'game')->limit(3)->orderBy('id', 'desc')->get();
        return view('app.index', compact('consoles', 'games'));
    }

    public function search(Request $req)
    {
        $products = Product::where('name', 'like', '%'.$req->search.'%')->get();
        return view('app.product', compact('products'));
    }

    public function product(Request $req)
    {
        if (isset($req->category) && $req->category == 'console' || $req->category == 'game' || $req->category == 'accessory') {
            $products = Product::where('category', $req->category)->orderBy('id', 'desc')->get();
            return view('app.product', compact('products'));
        };

        $products = Product::all();
        return view('app.product', compact('products'));
    }

    public function show($id)
    {
        try {
            $product = Product::find($id);
            $user = $product->user;

            return view('app.show', compact('user', 'product'));
        } catch (\Exception $e) {
            return redirect('/products')->with('error', 'This product does not exist.');
        }
    }

    public function update($id)
    {
        $product = Product::find($id);

        if ($product->user_id != auth()->user()->id) {
            return redirect('/dashboard')->with('error', "You don't have permission to");
        }

        return view('app.edit', compact('product'));
    }

    public function destroy(Request $req, int $id)
    {
        $carts = $req->session()->get('cart');
        if($carts) {
            $key = array_search($id, $carts);
    
            if ($key or $key === 0) {
                unset($carts[$key]);
                $req->session()->put('cart', $carts);
            }
        }

        $product = Product::find($id);

        if ($product->user_id != auth()->user()->id) {
            return redirect('/dashboard')->with('error', "You don't have permission to");
        }

        $product->delete();

        return redirect('/dashboard')->with('success', 'Product deleted.');
    }

    public function cart(Request $req)
    {
        // $user = User::find(auth()->user()->id);
        // $cart = Product::find($user->cart);
        $cartSession = $req->session()->get('cart');
        //dd($cartSession);
        if ($cartSession) {
            $carts = [];
            $total = 0;

            foreach ($cartSession as $cart) {
                $product = Product::where('id', $cart)->get();

                array_push($carts, $product);

                $total += $product->sum('value');
            }
        } else {
            $carts = false;
            $total = 0;
        }
        //dd(count($carts));
        return view('app.cart', compact('carts', 'total'));
    }

    public function updateStore(StoreProductRequest $req, $id)
    {
        $product = Product::find($id);

        $data = $req->all();
        $data['image'] = $req->image->store('products');
        $data['user_id'] = auth()->user()->id;

        $product->update($data);

        return redirect('/dashboard')->with('success', 'Product updated!');
    }

    public function store(StoreProductRequest $req)
    {
        $data = $req->all();
        $data['image'] = $req->image->store('products');
        $data['user_id'] = auth()->user()->id;
        Product::create($data);
        return redirect('/dashboard')->with('success', 'Product created!');
    }
}
