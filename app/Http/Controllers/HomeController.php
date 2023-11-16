<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $newProducts = Product::orderBy('id', 'desc')->paginate(8);
        $discountedProducts = Product::where('discount', '>', 0)->get();
        return view("index", compact('newProducts', 'discountedProducts'));
    }

    public function showFormContact()
    {
        return view("contact");
    }

    public function handleContact(Request $request)
    {
        $valdidator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'required|max:255',
        ]);
        if ($valdidator->fails()) {
            return redirect()->back()->withErrors($valdidator, 'error')->withInput();
        }
        $data = [
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];
        Contact::create($data);
        Alert::success('Success', 'Contact sent successfully');
        return redirect()->back();
    }

    public function about()
    {
        return view('about');
    }

    public function viewOrder()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $orders = DB::table('order_details')
                ->join('orders', 'orders.id', '=', 'order_details.order_id')
                ->join('products', 'products.id', '=', 'order_details.product_id')
                ->where('orders.user_id', $user_id)
                ->get();
            return view('view-order', compact('orders'));
        } else {
            Alert::info('Info', 'Please log in to view orders');
            return redirect('/login');
        }
    }
}
