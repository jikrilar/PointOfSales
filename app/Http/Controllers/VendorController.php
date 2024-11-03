<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all vendors
        $vendors = Vendor::all();
        return view('vendors.index', compact('vendors'));// Get all vendors
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input fields
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'bank' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:50',
            'account_name' => 'nullable|string|max:255',
            'tax_number' => 'nullable|string|max:50',
            'vat' => 'nullable|string|max:50',
        ]);

        // Create vendor
        Vendor::create($validatedData);

        // Redirect to index with success message
        return redirect()->route('vendor.index')->with('success', 'Vendor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the vendor by ID
        $vendor = Vendor::findOrFail($id);
        return view('vendors.show', compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the vendor to edit
        $vendor = Vendor::findOrFail($id);
        return view('vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate input fields
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'bank' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:50',
            'account_name' => 'nullable|string|max:255',
            'tax_number' => 'nullable|string|max:50',
            'vat' => 'nullable|string|max:50',
        ]);

        // Find the vendor to update
        $vendor = Vendor::findOrFail($id);

        // Update the vendor details
        $vendor->update($validatedData);

        // Redirect to index with success message
        return redirect()->route('vendor.index')->with('success', 'Vendor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the vendor to delete
        $vendor = Vendor::findOrFail($id);

        // Delete the vendor
        $vendor->delete();

        // Redirect to index with success message
        return redirect()->route('vendor.index')->with('success', 'Vendor deleted successfully.');
    }
}
