<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tshirtCategory = Category::where('slug', 't-shirt')->first();
        $hoodieCategory = Category::where('slug', 'hoodie')->first();
        $jacketCategory = Category::where('slug', 'jacket')->first();
        $pantsCategory = Category::where('slug', 'pants')->first();
        $shortsCategory = Category::where('slug', 'shorts')->first();
        $shoesCategory = Category::where('slug', 'shoes')->first();
        $accessoriesCategory = Category::where('slug', 'accessories')->first();
        $bagsCategory = Category::where('slug', 'bags')->first();

        $nikeBrand = Brand::firstOrCreate(['name' => 'Nike', 'slug' => 'nike']);
        $adidasBrand = Brand::firstOrCreate(['name' => 'Adidas', 'slug' => 'adidas']);
        $pumaBrand = Brand::firstOrCreate(['name' => 'Puma', 'slug' => 'puma']);
        $newBalanceBrand = Brand::firstOrCreate(['name' => 'New Balance', 'slug' => 'new-balance']);

        $productsData = [
            [
                'name' => 'Basic T-Shirt',
                'slug' => 'basic-t-shirt',
                'description' => 'Comfortable and stylish basic t-shirt.',
                'price' => 25.00,
                'old_price' => null,
                'image' => 'img/product/product-7.jpg',
                'images' => ['img/product/product-7.jpg', 'img/product/product-7.jpg'],
                'sku' => 'TSHIRT001',
                'category_id' => $tshirtCategory->id ?? null,
                'brand_id' => $nikeBrand->id ?? null,
                'tags' => 't-shirt, basic, casual',
                'rating' => 4.5,
                'sizes' => [
                    ['size' => 'S', 'quantity' => 10],
                    ['size' => 'M', 'quantity' => 15],
                    ['size' => 'L', 'quantity' => 12],
                ],
            ],
            [
                'name' => 'Sporty Hoodie',
                'slug' => 'sporty-hoodie',
                'description' => 'Warm and comfortable hoodie for sports activities.',
                'price' => 50.00,
                'old_price' => 60.00,
                'image' => 'img/product/product-5.jpg',
                'images' => ['img/product/product-5.jpg', 'img/product/product-5.jpg'],
                'sku' => 'HOODIE001',
                'category_id' => $hoodieCategory->id ?? null,
                'brand_id' => $adidasBrand->id ?? null,
                'tags' => 'hoodie, sport, warm',
                'rating' => 4.7,
                'sizes' => [
                    ['size' => 'M', 'quantity' => 20],
                    ['size' => 'L', 'quantity' => 10],
                    ['size' => 'XL', 'quantity' => 8],
                ],
            ],
            [
                'name' => 'Denim Jacket',
                'slug' => 'denim-jacket',
                'description' => 'Classic denim jacket for a stylish look.',
                'price' => 75.00,
                'old_price' => null,
                'image' => 'img/product/product-13.jpg',
                'images' => ['img/product/product-13.jpg', 'img/product/product-13.jpg'],
                'sku' => 'JACKET001',
                'category_id' => $jacketCategory->id ?? null,
                'brand_id' => $pumaBrand->id ?? null,
                'tags' => 'jacket, denim, classic',
                'rating' => 4.2,
                'sizes' => [
                    ['size' => 'S', 'quantity' => 5],
                    ['size' => 'M', 'quantity' => 10],
                    ['size' => 'L', 'quantity' => 7],
                ],
            ],
            [
                'name' => 'Casual Shorts',
                'slug' => 'casual-shorts',
                'description' => 'Light and comfortable shorts for everyday wear.',
                'price' => 30.00,
                'old_price' => null,
                'image' => 'img/product/product-1.jpg',
                'images' => ['img/product/product-1.jpg', 'img/product/product-1.jpg'],
                'sku' => 'SHORTS001',
                'category_id' => $shortsCategory->id ?? null,
                'brand_id' => $newBalanceBrand->id ?? null,
                'tags' => 'shorts, casual, summer',
                'rating' => 4.0,
                'sizes' => [
                    ['size' => 'S', 'quantity' => 10],
                    ['size' => 'M', 'quantity' => 15],
                    ['size' => 'L', 'quantity' => 12],
                ],
            ],
            [
                'name' => 'Running Shoes',
                'slug' => 'running-shoes',
                'description' => 'High-performance running shoes.',
                'price' => 120.00,
                'old_price' => null,
                'image' => 'img/product/product-19.jpg',
                'images' => ['img/product/product-19.jpg', 'img/product/product-19.jpg'],
                'sku' => 'SHOES001',
                'category_id' => $shoesCategory->id ?? null,
                'brand_id' => $nikeBrand->id ?? null,
                'tags' => 'shoes, running, sport',
                'rating' => 4.9,
                'sizes' => [
                    ['size' => 'US 8', 'quantity' => 10],
                    ['size' => 'US 9', 'quantity' => 15],
                    ['size' => 'US 10', 'quantity' => 12],
                ],
            ],
            [
                'name' => 'Leather Backpack',
                'slug' => 'leather-backpack',
                'description' => 'Stylish leather backpack for daily use.',
                'price' => 80.00,
                'old_price' => null,
                'image' => 'img/product/product-5.jpg',
                'images' => ['img/product/product-5.jpg', 'img/product/product-5.jpg'],
                'sku' => 'BAGS001',
                'category_id' => $bagsCategory->id ?? null,
                'brand_id' => $adidasBrand->id ?? null,
                'tags' => 'bag, leather, backpack',
                'rating' => 4.6,
                'sizes' => [], // Bags might not have sizes
            ],
            [
                'name' => 'Sporty Cap',
                'slug' => 'sporty-cap',
                'description' => 'Comfortable cap for sports and casual wear.',
                'price' => 20.00,
                'old_price' => null,
                'image' => 'img/product/product-4.jpg',
                'images' => ['img/product/product-4.jpg', 'img/product/product-4.jpg'],
                'sku' => 'ACC001',
                'category_id' => $accessoriesCategory->id ?? null,
                'brand_id' => $pumaBrand->id ?? null,
                'tags' => 'cap, sport, accessory',
                'rating' => 4.3,
                'sizes' => [], // Caps might not have sizes
            ],
        ];

        foreach ($productsData as $productData) {
            $product = Product::firstOrCreate(
                ['slug' => $productData['slug']],
                collect($productData)->except(['sizes'])->toArray()
            );

            if (!empty($productData['sizes'])) {
                foreach ($productData['sizes'] as $sizeData) {
                    $product->sizes()->firstOrCreate($sizeData);
                }
            }
        }
    }
}