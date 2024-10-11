<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Brand;
use App\Models\ModelCar;
use Tests\TestCase;

class BrandModelControllerTest extends TestCase
{
    public function test_list_models_by_brand()
    {
        $brand = Brand::inRandomOrder()->first();
        $models = ModelCar::where('brand_id', $brand->id);
    }
}
