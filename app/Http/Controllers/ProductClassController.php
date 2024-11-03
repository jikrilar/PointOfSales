<?php

namespace App\Http\Controllers;

use App\Models\ProductClass;
use Illuminate\Http\Request;

class ProductClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all product classes
        $classes = ProductClass::all();
        return view('product-classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show form to create a new product class
        return view('product-classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:product_departments,name',
        ]);

        // Create a new product class
        ProductClass::create($validatedData);

        // Redirect to index with success message
        return redirect()->route('product-class.index')->with('success', 'Product Class created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the specific product class and load related products
        $class = ProductClass::with('products')->findOrFail($id);
        return view('product-classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the product class to edit
        $class = ProductClass::findOrFail($id);
        return view('product-classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:product_departments,name,' . $id,
        ]);

        // Find and update the product class
        $class = ProductClass::findOrFail($id);
        $class->update($validatedData);

        // Redirect to index with success message
        return redirect()->route('product-class.index')->with('success', 'Product Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product class and delete it
        $class = ProductClass::findOrFail($id);
        $class->delete();

        // Redirect to index with success message
        return redirect()->route('product-class.index')->with('success', 'Product Class deleted successfully.');
    }
}
