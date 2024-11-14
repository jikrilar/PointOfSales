<?php

namespace App\Http\Controllers;

use App\Models\ProductDepartment;
use Illuminate\Http\Request;

class ProductDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all product departments
        $departments = ProductDepartment::all();
        return view('product-departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show form to create a new product department
        return view('product-departments.create');
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

        // Create a new product department
        ProductDepartment::create($validatedData);

        // Redirect to index with success message
        return redirect()->route('product-department.index')->with('success', 'Product Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the specific product department and load related products
        $department = ProductDepartment::with('products')->findOrFail($id);
        return view('product-departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the product department to edit
        $department = ProductDepartment::findOrFail($id);
        return view('product-departments.edit', compact('department'));
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

        // Find and update the product department
        $department = ProductDepartment::findOrFail($id);
        $department->update($validatedData);

        // Redirect to index with success message
        return redirect()->route('product-department.index')->with('success', 'Product Department updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product department and delete it
        $department = ProductDepartment::findOrFail($id);
        $department->delete();

        // Redirect to index with success message
        return redirect()->route('product-department.index')->with('success', 'Product Department deleted successfully.');
    }
}
