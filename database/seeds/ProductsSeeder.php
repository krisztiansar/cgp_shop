<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'title' => 'Product 1',
                'category' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'price' => 1000,
                'sale_price' => null,
                'tax' => 27,
                'product_image' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Product 2',
                'category' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'price' => 1000,
                'sale_price' => null,
                'tax' => 27,
                'product_image' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Product 3',
                'category' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'price' => 1000,
                'sale_price' => null,
                'tax' => 27,
                'product_image' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Product 4',
                'category' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'price' => 1000,
                'sale_price' => null,
                'tax' => 27,
                'product_image' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Product 5',
                'category' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'price' => 1000,
                'sale_price' => null,
                'tax' => 27,
                'product_image' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Product 6',
                'category' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'price' => 1000,
                'sale_price' => null,
                'tax' => 27,
                'product_image' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Product 7',
                'category' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'price' => 1000,
                'sale_price' => null,
                'tax' => 27,
                'product_image' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Product 8',
                'category' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'price' => 1000,
                'sale_price' => null,
                'tax' => 27,
                'product_image' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Product 9',
                'category' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'price' => 1000,
                'sale_price' => null,
                'tax' => 27,
                'product_image' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Product 10',
                'category' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'price' => 1000,
                'sale_price' => null,
                'tax' => 27,
                'product_image' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        foreach ($products as $product) {

            DB::table('products')->insert([
                'title'         => $product['title'],
                'category'      => $product['category'],
                'description'   => $product['description'],
                'price'         => $product['price'],
                'sale_price'    => $product['sale_price'],
                'tax'           => $product['tax'],
                'product_image' => $product['product_image'],
                'status'        => $product['status'],
                'created_at'    => $product['created_at'],
                'updated_at'    => $product['updated_at'],
            ]);
        }
    }
}
