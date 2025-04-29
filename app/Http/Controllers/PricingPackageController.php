<?php

namespace App\Http\Controllers;

use App\Models\PackageFeature;
use App\Models\PricingPackage;
use Illuminate\Http\Request;

class PricingPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = PricingPackage::orderBy('display_order')->get();
        return view('pricing.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pricing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'features' => 'required|array',
            'features.*' => 'required|string',
        ]);

        $package = PricingPackage::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'is_popular' => $request->has('is_popular'),
            'icon' => $request->icon,
            'display_order' => $request->display_order ?? 0,
            'is_active' => $request->has('is_active')
        ]);

        $order = 0;

        foreach ($request->features as $feature) {
            PackageFeature::create([
                'pricing_package_id' => $package->id,
                'feature' => $feature,
                'display_order' => $order++
            ]);
        }

        return redirect()->route('pricing.index')->with('success', 'Package created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PricingPackage $pricing)
    {
        return view('pricing.edit', compact('pricing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PricingPackage $pricing)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'features' => 'required|array',
            'features.*' => 'required|string',
        ]);

        $pricing->update([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'is_popular' => $request->has('is_popular'),
            'icon' => $request->icon,
            'display_order' => $request->display_order ?? 0,
            'is_active' => $request->has('is_active')
        ]);


        //delete old freatures and then update it 
        $pricing->features()->delete();

        $order = 0;

        foreach ($request->features as $feature) {
            PackageFeature::create([
                'pricing_package_id' => $pricing->id,
                'feature' => $feature,
                'display_order' => $order++
            ]);
        }

        return redirect()->route('pricing.index')->with('success', 'Package updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PricingPackage $pricing)
    {
        $pricing->delete();
        return redirect()->route('pricing.index')->with('success', 'Package deleted successfully!');
    }
}
