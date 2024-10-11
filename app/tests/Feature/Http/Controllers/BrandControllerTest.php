<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class BrandControllerTest extends TestCase
{
    public function test_get_all_brand_count_match()
    {
        $countBrands = Brand::count();

        $response = $this->get('/brands');

        $response->assertOk();

        $response->assertJsonCount($countBrands, 'data');
    }

    public function test_average_price_calculate()
    {
        $countModels = 5;
        Brand::factory()->create();
        $models = Model::factory($countModels)->create();
        $sumPrice = 0;

        foreach ($models as $model) {
            $sumPrice += $model->average_price;
        }

        $averagePrice = $sumPrice / $countModels;
    }
}
