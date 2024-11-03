<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TransferOrder;
use App\Models\Received;
use Illuminate\Http\Request;

class ReceivedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all received items with related transfer orders and products
        $receivedItems = Received::with(['transferOrder', 'product'])->get();
        return view('receiveds.index', compact('receivedItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all transfer orders and products for the form dropdowns
        $transferOrders = TransferOrder::all();
        $products = Product::all();
        return view('receiveds.create', compact('transferOrders', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'transfer_order_id' => 'required|exists:transfer_orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity_received' => 'required|integer|min:1',
            'received_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Create a new received record
        Received::create($validatedData);

        // Redirect to index with success message
        return redirect()->route('received.index')->with('success', 'Received record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the received record by id with related transfer order and product
        $receivedItem = Received::with(['transferOrder', 'product'])->findOrFail($id);
        return view('receiveds.show', compact('receivedItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the received record to edit
        $receivedItem = Received::findOrFail($id);

        // Get all transfer orders and products for the form dropdowns
        $transferOrders = TransferOrder::all();
        $products = Product::all();

        return view('receiveds.edit', compact('receivedItem', 'transferOrders', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the received record to edit
        $receivedItem = Received::findOrFail($id);

        // Get all transfer orders and products for the form dropdowns
        $transferOrders = TransferOrder::all();
        $products = Product::all();

        return view('receiveds.edit', compact('receivedItem', 'transferOrders', 'products'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the received record to delete
        $receivedItem = Received::findOrFail($id);

        // Delete the record
        $receivedItem->delete();

        // Redirect to index with success message
        return redirect()->route('received.index')->with('success', 'Received record deleted successfully.');
    }
}
