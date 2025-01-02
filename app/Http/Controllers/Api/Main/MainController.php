<?php

namespace App\Http\Controllers\Api\Main;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $products = Product::paginate(10);
        return response()->json($products);
    }

    public function showProduct(Request $request)
    {
        $product = Product::where('id',$request->product_id, )->first();

    if (!$product) {
        return response()->json(['status' => 0, 'msg' => 'Product not found']);
    }

    return response()->json(['status' => 1, 'msg' => 'Product found successfully', 'data' => $product]);
    }

}
