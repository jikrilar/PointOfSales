<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrder; // Model SalesOrder yang akan digunakan
use App\Models\Branch; // Model Branch untuk mendapatkan data cabang

class SalesHistoryController extends Controller
{
    public function index()
    {
        $branches = Branch::all(); // Ambil semua cabang
        return view('sales_history.index', compact('branches'));
    }

    public function show($branchId)
    {
        // Dapatkan data penjualan berdasarkan cabang
        $salesOrders = SalesOrder::where('branch_id', $branchId)->orderBy('created_at', 'desc')->get();
        $branch = Branch::findOrFail($branchId); // Dapatkan informasi cabang

        return view('sales_history.show', compact('salesOrders', 'branch'));
    }
}
