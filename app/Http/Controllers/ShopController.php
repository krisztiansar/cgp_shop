<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function index(){

        try {

            $category_list = DB::table('product_categories')->where('product_categories.status', 1)
                ->join('images', 'product_categories.category_image', '=', 'images.id')
                ->select('product_categories.*', 'images.*', 'product_categories.id as category_id')
                ->get();

            $products = DB::table('products')->where('products.status', 1)
                ->join('images', 'products.product_image', '=', 'images.id')
                ->select('products.*', 'images.*', 'products.id as product_id')
                ->get();

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $data = [
            'category_list' => $category_list,
            'products' => $products
        ];

        return view('welcome')->with($data);
    }

    public function list(Request $request){

        $products = DB::table('products')->where('products.status', 1)->where('products.category', $request->category_id)
            ->join('images', 'products.product_image', '=', 'images.id')
            ->select('products.*', 'images.*', 'products.id as product_id')
            ->get();

        $data = [
            'products' => $products
        ];

        return response()->json($data);
    }
}
