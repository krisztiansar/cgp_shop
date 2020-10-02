<?php

use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            [
                'image_name' => '2020_10_02_04_10_17_40638.jpeg',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'image_name' => '2020_10_02_04_10_05_67823.jpeg',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'image_name' => '2020_10_02_01_10_45_56223.jpeg',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ];

        foreach ($images as $image) {

            DB::table('images')->insert([
                'image_name'    => $image['image_name'],
                'status'        => $image['status'],
                'created_at'    => $image['created_at'],
                'updated_at'    => $image['updated_at'],
            ]);
        }
    }
}
