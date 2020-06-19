<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name'=>'Product 1',
            'price'=> 19.99,
            'category_id'=>1,
            'description'=>'Description1'
        ]);
        Product::create([
            'name'=>'Product 2',
            'price'=> 99.99,
            'category_id'=>3,
            'description'=>'Description2'
        ]);
        Product::create([
            'name'=>'Product 3',
            'price'=> 23.99,
            'category_id'=>2,
            'description'=>'Description3'
        ]);
    }
}
