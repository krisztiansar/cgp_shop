<?php

use Illuminate\Database\Seeder;

class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_categories = [
            [
                'title' => 'Food',
                'category_image' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Sport',
                'category_image' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ];

        foreach ($product_categories as $product_category) {

            DB::table('product_categories')->insert([
                'title'         => $product_category['title'],
                'category_image'=> $product_category['category_image'],
                'status'        => $product_category['status'],
                'created_at'    => $product_category['created_at'],
                'updated_at'    => $product_category['updated_at'],
            ]);
        }
    }
}
