<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\ModelCar;
use App\Traits\ModelsTrait;
use Illuminate\Database\Seeder;

class ModelCarSeeder extends Seeder
{
    use ModelsTrait;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $models = $this->readModels();
        $brands = Brand::all();

        foreach ($models as $item) {
            $brand = $brands->where('name', '=', $item['brand_name'])->first();

            ModelCar::create([
                'name' => $item['name'],
                'average_price' => $item['average_price'],
                'brand_id' => $brand->id,
            ]);
        }
    }
}
