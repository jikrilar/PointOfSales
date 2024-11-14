<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data diskon
        $discounts = Discount::with('products')->get();
        return view('discounts.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengambil semua produk untuk dropdown
        $products = Product::all();
        return view('discounts.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount_percent' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        // Membuat diskon baru
        $discount = Discount::create([
            'name' => $request->name,
            'description' => $request->description,
            'discount_percent' => $request->discount_percent,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // Melampirkan produk yang terkait dengan diskon
        $discount->products()->attach($request->products);

        return redirect()->route('discount.index')->with('success', 'Discount created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan data diskon dengan produk yang terkait
        $discount = Discount::with('products')->findOrFail($id);
        return view('discounts.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menemukan diskon yang akan diedit
        $discount = Discount::findOrFail($id);
        $products = Product::all();

        return view('discounts.edit', compact('discount', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'discount_percent' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'products' => 'required|array',
            'products.*' => 'exists:products,id',
        ]);

        // Temukan diskon yang akan diupdate
        $discount = Discount::findOrFail($id);

        // Update data diskon
        $discount->update([
            'name' => $request->name,
            'description' => $request->description,
            'discount_percent' => $request->discount_percent,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        // Sync produk terkait dengan diskon
        $discount->products()->sync($request->products);

        return redirect()->route('discount.index')->with('success', 'Discount updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan diskon yang akan dihapus
        $discount = Discount::findOrFail($id);

        // Hapus diskon dan detach produk yang terkait
        $discount->products()->detach();
        $discount->delete();

        return redirect()->route('discount.index')->with('success', 'Discount deleted successfully.');
    }
}
