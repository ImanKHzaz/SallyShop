<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'هاتف ذكي Samsung Galaxy S24',
                'description' => 'هاتف ذكي بمواصفات عالية وكاميرا احترافية',
                'price' => 2999.99,
                'quantity' => 15,
                'category_id' => 1,
            ],
            [
                'name' => 'جهاز iPad Pro 12.9 بوصة',
                'description' => 'جهاز لوحي قوي مناسب للعمل والترفيه',
                'price' => 1899.99,
                'quantity' => 10,
                'category_id' => 1,
            ],
            [
                'name' => 'سماعات رأس Bluetooth',
                'description' => 'سماعات لاسلكية عالية الجودة بصوت ستيريو واضح',
                'price' => 299.99,
                'quantity' => 50,
                'category_id' => 1,
            ],
            [
                'name' => 'تي شيرت قطن رجالي',
                'description' => 'تي شيرت مريح وأنيق من أفضل الخامات',
                'price' => 79.99,
                'quantity' => 100,
                'category_id' => 2,
            ],
            [
                'name' => 'جينز أزرق كلاسيكي',
                'description' => 'جينز مريح وعصري يناسب جميع المناسبات',
                'price' => 149.99,
                'quantity' => 75,
                'category_id' => 2,
            ],
            [
                'name' => 'طاولة قهوة خشبية',
                'description' => 'طاولة قهوة فاخرة من الخشب الطبيعي',
                'price' => 599.99,
                'quantity' => 20,
                'category_id' => 3,
            ],
            [
                'name' => 'كرسي جلوس مريح',
                'description' => 'كرسي مكتبي مريح مع إمكانية التحكم بالارتفاع',
                'price' => 799.99,
                'quantity' => 30,
                'category_id' => 3,
            ],
            [
                'name' => 'رواية "لا تنه عن خلق وتأتي بمثله"',
                'description' => 'رواية أدبية مشهورة للكاتب الراحل علي الطنطاوي',
                'price' => 49.99,
                'quantity' => 40,
                'category_id' => 4,
            ],
            [
                'name' => 'دراجة جبلية رياضية',
                'description' => 'دراجة عالية الجودة مناسبة للرحلات والتمارين',
                'price' => 899.99,
                'quantity' => 12,
                'category_id' => 5,
            ],
            [
                'name' => 'حقيبة ظهر رياضية',
                'description' => 'حقيبة مريحة وعملية للرحلات والتدريب',
                'price' => 199.99,
                'quantity' => 60,
                'category_id' => 5,
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'description' => $product['description'],
                'price' => $product['price'],
                'quantity' => $product['quantity'],
                'category_id' => $product['category_id'],
            ]);
        }
    }
}
