<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function getBrandAveragePrice(Brand $brand): float
    {
        $models = $brand->models()->get();
        $sumPrices = 0;
        $countModels = $models->count();

        foreach ($models as $model) {
            $sumPrices += $model->average_price;
        }

        return $sumPrices / $countModels;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $brands = Brand::all();
        $response = collect();

        foreach ($brands as $brand) {
            $averagePrice = $this->getBrandAveragePrice($brand);

            $response->push([
                'id' => $brand->id,
                'nombre' => $brand->name,
                'average_price' => $averagePrice,
            ]);

            return response()->json($response, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validator = Validator::make($request->all(), [
            'name' => 'unique:brands,name',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json(['message' => implode(' ', $errors->all())], 400);
        }

        $brand = Brand::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'data' => $brand,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
