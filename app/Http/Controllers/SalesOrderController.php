<?php

namespace App\Http\Controllers;

use App\Models\SalesOrder;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Inventory; // Import inventory model
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all sales orders with their related customers
        $salesOrders = SalesOrder::with('customer')->get();
        return view('sales-orders.index', compact('salesOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all customers and products for the form dropdown
        $customers = Customer::all();
        $products = Product::all();
        return view('transaction', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input fields
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        // Create the sales order
        $salesOrder = SalesOrder::create([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);

        // Attach products to the sales order with quantity
        foreach ($request->products as $product) {
            // Find the inventory for the product
            $inventory = Inventory::where('product_id', $product['id'])->first();

            if ($inventory && $inventory->stock >= $product['quantity']) {
                // Attach the product with quantity and price (from inventory)
                $salesOrder->products()->attach($product['id'], [
                    'quantity' => $product['quantity'],
                    'unit_price' => $inventory->price,  // Assuming price is stored in inventory
                    'total_price' => $inventory->price * $product['quantity'],
                ]);

                // Update inventory stock
                $inventory->stock -= $product['quantity'];
                $inventory->save();
            } else {
                return redirect()->back()->with('error', 'Not enough stock for product ID: ' . $product['id']);
            }
        }

        // Redirect to index with success message
        return redirect()->route('sales-order.index')->with('success', 'Sales Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the sales order and load its customer and products relationships
        $salesOrder = SalesOrder::with(['customer', 'products'])->findOrFail($id);
        return view('sales-orders.show', compact('salesOrder'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Find the sales order to edit
        $salesOrder = SalesOrder::findOrFail($id);

        // Get customers and products for the form dropdown
        $customers = Customer::all();
        $products = Product::all();

        return view('sales-orders.edit', compact('salesOrder', 'customers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate input fields
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required',
            'products' => 'required|array',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        // Find the sales order to update
        $salesOrder = SalesOrder::findOrFail($id);

        // Update the sales order details
        $salesOrder->update([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);

        // Detach old products
        $salesOrder->products()->detach();

        // Attach new products to the sales order with quantity
        foreach ($request->products as $product) {
            $inventory = Inventory::where('product_id', $product['id'])->first();

            if ($inventory && $inventory->stock >= $product['quantity']) {
                // Attach the product with quantity and price
                $salesOrder->products()->attach($product['id'], [
                    'quantity' => $product['quantity'],
                    'unit_price' => $inventory->price,
                    'total_price' => $inventory->price * $product['quantity'],
                ]);

                // Update inventory stock
                $inventory->stock -= $product['quantity'];
                $inventory->save();
            } else {
                return redirect()->back()->with('error', 'Not enough stock for product ID: ' . $product['id']);
            }
        }

        // Redirect to index with success message
        return redirect()->route('sales-order.index')->with('success', 'Sales Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the sales order to delete
        $salesOrder = SalesOrder::findOrFail($id);

        // Update inventory stock before deleting the order
        foreach ($salesOrder->products as $product) {
            $inventory = Inventory::where('product_id', $product->id)->first();

            if ($inventory) {
                // Return the product's quantity to stock
                $inventory->stock += $product->pivot->quantity;
                $inventory->save();
            }
        }

        // Detach related products and delete the sales order
        $salesOrder->products()->detach();
        $salesOrder->delete();

        // Redirect to index with success message
        return redirect()->route('sales-order.index')->with('success', 'Sales Order deleted successfully.');
    }
}
