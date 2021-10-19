<?php

namespace Database\Seeders;

use App\Models\Product;
use Database\Factories\ProductFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(10)->create();
    }
}
