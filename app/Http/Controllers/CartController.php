<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->middleware('auth');
        $this->product = $product;
    }

    public function addToCart($id)
    {

        $product = $this->product->findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addToCart($product);
        Session::put('cart', $cart);
        Session::flash('success', "Thêm sản phẩm vào giỏ hàng thành công");
        return back();
    }

    public function show()
    {
        $cart = Session::get('cart');
        return view('products.showCart', compact('cart'));
    }

    public function remove($ProductId)
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            if (count($oldCart->items) > 0) {
                $cart = new Cart($oldCart);
                $cart->remove($ProductId);
                Session::put('cart', $cart);
                Session::flash('success', "Xóa sản phẩm thành công");
            } else {
                Session::flash('delete_error', 'Bạn chưa mua sản phẩm nào');
            }
        } else {
            Session::flash('delete_error', 'Bạn chưa mua sản phẩm nào');
        }
        return redirect()->back();
    }

    public function plus($id)
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            if (count($oldCart->items) > 0) {
                $cart = new  Cart($oldCart);
                $cart->plus($id);
                Session::put('cart', $cart);
            } else {
                Session::flash('delete_error', 'Bạn chưa mua sản phẩm nào');
            }
            return redirect()->back();
        }
    }

    public function subtraction($id)
    {
        if (Session::has('cart')) {
            $oldCart = Session::get('cart');
            if (count($oldCart->items) > 0) {
                $cart = new  Cart($oldCart);
                $cart->subtraction($id);
                Session::put('cart', $cart);
            } else {
                Session::flash('delete_error', 'Bạn chưa mua sản phẩm nào');
            }
            return redirect()->back();
        }
    }
}
