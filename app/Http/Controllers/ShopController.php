<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('products', compact('products', 'categories'));
    }
    public function filter(Request $request)
    {
        $categoryIds = $request->input('cate', []);
        $price = $request->input('price');
        $query = Product::query();
        if (!empty($categoryIds)) {
            $query->whereIn('cate_id', $categoryIds);
        }
        if (!empty($price)) {
            switch ($price) {
                case '0-10':
                    $query->whereBetween('price', [0, 10000000]);
                    break;
                case '10-30':
                    $query->whereBetween('price', [10000000, 30000000]);
                    break;
                case '30-50':
                    $query->whereBetween('price', [30000000, 50000000]);
                    break;
                case '50+':
                    $query->where('price', '>=', 50000000);
                    break;
            }
        }
        $products = $query->paginate(10);
        return view('includes.list-products', compact('products'));
    }
    public function showDetailProduct($id)
    {
        $product = Product::with('category')->find($id);
        $productComments = Product::with('comments')->find($id);
        return view('product-detail', compact('product', 'productComments'));
    }
    public function handleCommentSubmit(Request $request)
    {
        $valdidator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'messages' => 'required|max:255',
            'rating' => 'required'
        ]);
        if ($valdidator->fails()) {
            return redirect()->back()->withErrors($valdidator, 'error')->withInput();
        }
        $data = [
            'product_id' => $request->input('product_id'),
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'messages' => $request->input('messages'),
            'rating' => $request->input('rating')
        ];
        ProductComment::create($data);
        Alert::success('Notifications', 'Comment successfully sent');
        return redirect()->back();
    }
}
