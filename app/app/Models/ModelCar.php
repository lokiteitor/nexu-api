<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelCar extends Model
{
    /** @use HasFactory<\Database\Factories\ModelCarFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'models';

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
