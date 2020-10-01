<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
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

    public function listCategories(){
        try {

            $category_list = DB::table('product_categories')->where('product_categories.status', 1)
                ->join('images', 'product_categories.category_image', '=', 'images.id')
                ->select('product_categories.*', 'images.*', 'product_categories.id as category_id')
                ->paginate(10);

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        $data = [
            'category_list' => $category_list
        ];

        return view('admin.categories.list-categories')->with($data);
    }

    public function newCategories(){
        return view('admin.categories.new-categories');
    }

    public function addCategories(Request $request){
        try {

            $destinationPath = public_path('/images/uploads');
            $ldate = date('Y_m_d_h_m_s');
            $image = $request->file('category_image');

            if($image){
                $extension = $request->file('category_image')->extension();
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

                DB::table('product_categories')->insert([
                    'title' => $request->category_name,
                    'category_image' => $last_id,
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        return Redirect::back()->with('message','Success! The new category created!');
    }

    public function editCategory(Request $request){
        try {

            $default_category = DB::table('product_categories')->where('id', $request->category_id)->first();

            DB::table('product_categories')
                ->where('id', $request->category_id)
                ->update(array('title' => $request->category_name, 'updated_at' => now()));

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        return Redirect::back()->with('message','Success! The "'.$default_category->title.'" category name is changed to "'.$request->category_name.'"!');
    }

    public function deleteCategory($category_id){
        try {

            $selected_category = DB::table('product_categories')->where('id', $category_id)->first();

            DB::table('product_categories')
                ->where('id', $category_id)
                ->update(array('status' => 0, 'updated_at' => now()));

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        return Redirect::back()->with('message','Success! The "'.$selected_category->title.'" category is deleted!');
    }
}
