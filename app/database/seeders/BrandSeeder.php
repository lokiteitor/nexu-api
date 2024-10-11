<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Traits\ModelsTrait;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    use ModelsTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $models = $this->readModels();
        $modelsBrandUnique = $models->unique('brand_name')->map(function ($item, $key) {
            return $item['brand_name'];
        });

        foreach ($modelsBrandUnique as $brandName) {
            Brand::create([
                'name' => $brandName,
            ]);
        }
    }
}
