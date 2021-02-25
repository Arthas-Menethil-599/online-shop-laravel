<?php

namespace App\Http\Controllers;

use App\Models\Analytic;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Type;

class CartController extends Controller
{
    public function index()
    {
        $cartCollection = \Cart::session(auth()->user()->id)->getContent();
        return view('cart.index', ['cartCollection' => $cartCollection]);
    }
    public function addToCart(Request $request){
        $product = Product::where('id', $request->product_id)->first();
        \Cart::session(auth()->user()->id);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => 1,
            'attributes' => [
                'img' => isset($product->img) ? $product->img : 'no_image.png'
            ]
        ]);
        return redirect(route('cart.index'));
//        return response()->json(\Cart::getContent());
    }

    public function removeFromCart(Request $request) {
        \Cart::session(auth()->user()->id)
            ->remove($request->id);

        return redirect(route('cart.index'));
    }

    public function updateCart(Request $request) {
        $qty = \Cart::session(auth()->user()->id)
            ->get($request->id)['quantity'];
        \Cart::update($request->id, array(
                'quantity' => -$qty + 1
            ));

        \Cart::update($request->id, array(
            'quantity' => $request->qty - 1
        ));

        return redirect(route('cart.index'));
    }

    public function confirm_purchase(Request $request) {
        $analysis = new Analytic();
        $analysis->qtySoldProducts = \Cart::session(auth()->user()->id)
            ->getTotalQuantity();
        $analysis->earnedMoney = \Cart::session(auth()->user()->id)
            ->getTotal();
        $analysis->save();

        \Cart::session(auth()->user()->id)->clear();

        return redirect(route('cart.index'));
    }
}
