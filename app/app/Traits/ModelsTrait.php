<?php

namespace App\Traits;

trait ModelsTrait
{
    public function readModels()
    {
        $path = database_path('seeders/data/models.json');

        $modelsJSON = file_get_contents($path);

        $models = collect(json_decode($modelsJSON, true));

        return $models;
    }
}
