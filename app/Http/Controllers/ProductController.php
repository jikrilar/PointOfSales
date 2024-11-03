<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductClass;
use App\Models\ProductDepartment;
use App\Models\ProductSubclass;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data produk dari database
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat produk baru
        $departments = ProductDepartment::all();
        $classes = ProductClass::all();
        $subclasses = ProductSubclass::all();
        $brands = Brand::all();
        return view('products.create', compact('departments', 'classes', 'subclasses', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'brand_id' => 'required',
            'department_id' => 'required',
            'classes' => 'required',
            'subclasses' => 'required',
        ]);

        // Upload file image produk jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        // Simpan data produk baru ke database
        Product::create([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imagePath ?? null,
            'brand_id' => $request->input('brand_id'),
            'department_id' => $request->input('department_id'),
            'class_id' => $request->input('class_id'),
            'subclass_id' => $request->input('subclass_id'),
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tampilkan detail produk
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Tampilkan form untuk mengedit data produk
        $product = Product::findOrFail($id);
        $departments = ProductDepartment::all();
        $classes = ProductClass::all();
        $subclasses = ProductSubclass::all();
        $brands = Brand::all();
        return view('products.edit', compact('product', 'departments', 'classes', 'subclasses', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input dari form
        $request->validate([
            'code' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'brand_id' => 'required',
            'department_id' => 'required',
            'class_id' => 'required',
            'subclass_id' => 'required',
        ]);

        // Upload file image produk jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        // Update data produk
        Product::find($id)->update([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imagePath,
            'brand_id' => $request->input('brand_id'),
            'department_id' => $request->input('department_id'),
            'class_id' => $request->input('class_id'),
            'subclass_id' => $request->input('subclass_id'),
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data produk dari database
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function showdetail($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return response()->json([
            'name' => $product->name,
            'description' => $product->description,
            'price' => $product->price,
            'image' => asset('storage/' . $product->image), // pastikan path sesuai
            'department_id' => $product->department->name ?? 'N/A',
            'class_id' => $product->class->name ?? 'N/A',
            'subclass_id' => $product->subclass->name ?? 'N/A',
            'brand_id' => $product->brand->name ?? 'N/A',
        ]);
    }
}
