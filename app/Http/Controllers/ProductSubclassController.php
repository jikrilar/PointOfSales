<?php

namespace App\Http\Controllers;

use App\Models\ProductSubclass;
use Illuminate\Http\Request;

class ProductSubclassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all product classes
        $subclasses = ProductSubclass::all();
        return view('product-subclasses.index', compact('subclasses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show form to create a new product class
        return view('product-subclasses.create');
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
        ProductSubclass::create($validatedData);

        // Redirect to index with success message
        return redirect()->route('product-subclass.index')->with('success', 'Product Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the specific product class and load related products
        $subclass = ProductSubclass::with('products')->findOrFail($id);
        return view('product-subclasses.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the product class to edit
        $subclass = ProductSubclass::findOrFail($id);
        return view('product-subclasses.edit', compact('class'));
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
        $subclass = ProductSubclass::findOrFail($id);
        $subclass->update($validatedData);

        // Redirect to index with success message
        return redirect()->route('product-subclass.index')->with('success', 'Product Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product class and delete it
        $subclass = ProductSubclass::findOrFail($id);
        $subclass->delete();

        // Redirect to index with success message
        return redirect()->route('product-subclass.index')->with('success', 'Product Department deleted successfully.');
    }
}
