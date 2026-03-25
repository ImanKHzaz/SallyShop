<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'الإلكترونيات', 'description' => 'أجهزة إلكترونية حديثة وملحقاتها'],
            ['name' => 'الملابس', 'description' => 'ملابس عصرية للرجال والنساء والأطفال'],
            ['name' => 'الأثاث', 'description' => 'أثاث منزلي وديكور عصري'],
            ['name' => 'الكتب', 'description' => 'كتب متنوعة وقصص مشهورة'],
            ['name' => 'الرياضة', 'description' => 'معدات رياضية وملابس رياضية'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
            ]);
        }
    }
}
