<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = collect(['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5', 'Product 6', 'Product 7', 'Product 8', 'Product 9', 'Product 10']);

        $product->each(function ($product){
            Product::create([
                'name' => $product,
                'description' => 'Ini Produknya',
                'stock' => rand(1,10)
            ]);
        });
    }
}
