<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 5)->create();
        $this->call(ProductsSeeder::class);
        $this->call(UserSeeder::class);
    
    }
}
