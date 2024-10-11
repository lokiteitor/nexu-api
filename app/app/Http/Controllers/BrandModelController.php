<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $brandId)
    {
        //
        $brand = Brand::firstOrFail($brandId);

        $models = $brand->models()->get();

        return response()->json([
            'data' => $models,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'average_price' => 'gt:100000',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return response()->json(['message' => implode(' ', $errors->all())], 400);
        }
        // TODO: continuar
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
