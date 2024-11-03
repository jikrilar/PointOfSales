<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Branch;
use App\Models\TransferOrder;
use App\Models\TransferOrderItem;
use Illuminate\Http\Request;

class TransferOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transferOrders = TransferOrder::with('items')->get();
        return view('transfer-orders.index', compact('transferOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $branches = Branch::all();
        return view('transfer-orders.create', compact('products', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'source_branch' => 'required',
            'destination_branch' => 'required',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $transferOrder = TransferOrder::create([
            'source_branch' => $request->source_branch,
            'destination_branch' => $request->destination_branch,
        ]);

        foreach ($request->items as $item) {
            TransferOrderItem::create([
                'transfer_order_id' => $transferOrder->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);
        }

        return redirect()->route('transfer-order.index')->with('success', 'Transfer Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transferOrder = TransferOrder::with('items.product')->findOrFail($id);
        return view('transfer-orders.show', compact('transferOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transferOrder = TransferOrder::with('items')->findOrFail($id);
        $products = Product::all();
        return view('transfer-orders.edit', compact('transferOrder', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'source_branch' => 'required',
            'destination_branch' => 'required',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $transferOrder = TransferOrder::findOrFail($id);
        $transferOrder->update([
            'source_branch' => $request->source_branch,
            'destination_branch' => $request->destination_branch,
        ]);

        // Clear existing items and add new ones
        $transferOrder->items()->delete();
        foreach ($request->items as $item) {
            TransferOrderItem::create([
                'transfer_order_id' => $transferOrder->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);
        }

        return redirect()->route('transfer-order.index')->with('success', 'Transfer Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transferOrder = TransferOrder::findOrFail($id);
        $transferOrder->items()->delete(); // Delete associated items
        $transferOrder->delete(); // Delete the transfer order

        return redirect()->route('transfer-order.index')->with('success', 'Transfer Order deleted successfully.');
    }
}
