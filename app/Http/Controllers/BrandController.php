<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'website_url' => 'nullable|url'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        if ($request->hasFile('logo')) {
            $fileName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('logos'), $fileName);
            $brand->logo = $fileName;
        }
        $brand->website_url = $request->website_url;
        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'website_url' => 'nullable|url'
        ]);

        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->description = $request->description;
        if ($request->hasFile('logo')) {
            $fileName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('logos'), $fileName);
            $brand->logo = $fileName;
        }
        $brand->website_url = $request->website_url;
        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand->logo) {
            $logoPath = public_path('logos') . '/' . $brand->logo;
            if (file_exists($logoPath)) {
                unlink($logoPath); // Menghapus file logo dari folder public
            }
        }
        $brand->delete();

        return redirect()->route('brand.index')->with('success', 'Brand deleted successfully.');
    }
}
