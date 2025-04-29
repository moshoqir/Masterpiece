<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageFeature extends Model
{
    use HasFactory;

    protected $fillable = ['pricing_package_id', 'feature', 'display_order'];

    public function package()
    {
        return $this->belongsTo(PricingPackage::class, 'pricing_package_id');
    }
}
