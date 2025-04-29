<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PricingPackage;

class PricingController extends Controller
{
    public function index()
    {
        $packages = PricingPackage::where('is_active', true)
            ->orderBy('display_order')
            ->with('features')
            ->get();

        return view('home', compact('packages'));
    }

    public function indexPage()
    {
        $packages = PricingPackage::OrderBy('price')->get();

        return view('pricing', compact('packages'));
    }
}
