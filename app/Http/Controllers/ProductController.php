<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
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

    public function listProducts(){
        try {

            $category_list = DB::table('product_categories')->where('status', 1)->get();

            $products = DB::table('products')->where('products.status', 1)
                ->join('product_categories', 'products.category', '=', 'product_categories.id')
                ->join('images', 'products.product_image', '=', 'images.id')
                ->select('products.*', 'product_categories.*', 'images.*', 'products.title as product_title', 'products.id as product_id')
                ->paginate(10);

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $data = [
            'category_list' => $category_list,
            'products' => $products
        ];

        return view('admin.products.list-products')->with($data);
    }

    public function newProduct(){
        try {

            $category_list = DB::table('product_categories')->where('status', 1)->get();

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $data = [
            'category_list' => $category_list
        ];

        return view('admin.products.new-product')->with($data);
    }

    public function addProduct(Request $request){
        try {

            $destinationPath = public_path('/images/uploads');
            $ldate = date('Y_m_d_h_m_s');
            $image = $request->file('product_image');

            if($image){
                $extension = $request->file('product_image')->extension();
                $random_num = rand(10,100000);

                $fileName = $ldate."_".$random_num.".".$extension;

                $image->move($destinationPath, $fileName);

                DB::table('images')->insert([
                    'image_name' => $fileName,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $last_id = DB::getPdo()->lastInsertId();

                DB::table('products')->insert([
                    'title' => $request->product_name,
                    'category' => $request->category,
                    'description' => $request->product_description,
                    'price' => $request->product_price,
                    'sale_price' => $request->product_sale_price,
                    'tax' => $request->product_tax,
                    'product_image' => $last_id,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        return Redirect::back()->with('message','Success! The new product is created!');
    }

    public function editProduct(Request $request){
        try {

            $destinationPath = public_path('/images/uploads');
            $ldate = date('Y_m_d_h_m_s');
            $image = $request->file('product_image');

            if($image){
                $extension = $request->file('product_image')->extension();
                $random_num = rand(10,100000);

                $fileName = $ldate."_".$random_num.".".$extension;

                $image->move($destinationPath, $fileName);

                DB::table('images')->insert([
                    'image_name' => $fileName,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $last_id = DB::getPdo()->lastInsertId();

                DB::table('products')
                    ->where('id', $request->product_id)
                    ->update(array(
                        'title' => $request->product_name,
                        'category' => $request->category,
                        'description' => $request->product_description,
                        'price' => $request->product_price,
                        'sale_price' => $request->product_sale_price,
                        'tax' => $request->product_tax,
                        'product_image' => $last_id,
                        'updated_at' => now()
                    ));
            }else{
                DB::table('products')
                    ->where('id', $request->product_id)
                    ->update(array(
                        'title' => $request->product_name,
                        'category' => $request->category,
                        'description' => $request->product_description,
                        'price' => $request->product_price,
                        'sale_price' => $request->product_sale_price,
                        'tax' => $request->product_tax,
                        'updated_at' => now()
                    ));
            }

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        return Redirect::back()->with('message','Success! The "'.$request->product_name.'" product is edited!');
    }

    public function deleteProduct($product_id){
        try {

            $selected_product = DB::table('products')->where('id', $product_id)->first();

            DB::table('products')
                ->where('id', $product_id)
                ->update(array('status' => 0, 'updated_at' => now()));

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        return Redirect::back()->with('message','Success! The "'.$selected_product->title.'" product is deleted!');
    }
}
