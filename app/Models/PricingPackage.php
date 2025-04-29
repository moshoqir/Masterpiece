<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'duration',
        'is_popular',
        'icon',
        'display_order',
        'is_active'
    ];


    public function features()
    {
        return $this->hasMany(PackageFeature::class);
    }
}
