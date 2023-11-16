<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function index()
    {
        return view('view-cart');
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price - ($product->price * $product->discount / 100),
            'weight' => 0,
            'options' => [
                'image' => $product->image,
            ],
        ]);
        Alert::success('Success', 'Product added to cart successfully');
        return redirect()->back();
    }
    public function updateQuantity(Request $request)
    {
        $rowId = $request->input('rowId');
        $quantity = $request->input('quantity');
        Cart::update($rowId, $quantity);
        return redirect()->back();
    }
    public function deleteCart()
    {
        Cart::destroy();
        Alert::success('Success', 'Cart cleared successfully');
        return redirect()->back();
    }
    public function deleteItem(Request $request)
    {
        $rowId = $request->input('rowId');
        Cart::remove($rowId);
        return redirect()->back();
    }
    public function checkout()
    {
        return view('checkout');
    }
    public function handleCheckout(Request $request)
    {
        $valdidator = Validator::make($request->all(), [
            'address' => 'required|max:255',
            'phone' => 'required|numeric|min:11',
        ]);
        if ($valdidator->fails()) {
            return redirect()->back()->withErrors($valdidator, 'error')->withInput();
        }
        Order::create([
            'user_id' => Auth::user()->id,
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
        ]);
        $order_id = Order::max('id');
        foreach (Cart::content() as $item) {
            OrderDetail::create([
                'order_id' => $order_id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'total' => $item->qty * $item->price
            ]);
        }
        Cart::destroy();
        Alert::success('Success', 'Order placed successfully');
        return redirect()->intended();
    }
}
