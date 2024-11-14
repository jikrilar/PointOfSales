<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getBranchInfo($nik)
    {
        // Ambil user berdasarkan NIK dan relasi ke cashier dan branch
        $user = User::where('nik', $nik)->with('cashier.branch')->first();

        if ($user && $user->cashier && $user->cashier->branch) {
            return response()->json([
                'branch_code' => $user->cashier->branch->code,
                'branch_name' => $user->cashier->branch->name,
            ]);
        }

        // Jika tidak ditemukan
        return response()->json(['branch_code' => null, 'branch_name' => null]);
    }

    public function index()
    {
        $cashiers = Cashier::with('branch')->get();
        return view('cashiers.index', compact('cashiers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all(); // Pastikan untuk mengambil semua cabang
        return view('cashiers.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:cashier',
            'password' => 'required|min:6',
            'phone_number' => 'required',
            'branch_id' => 'required|exists:branches,id',
        ]);

        User::create([
            'username' => $request->username,
            'role' => 'cashier',
        ]);

        Cashier::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'branch_id' => $request->branch_id,
            'user_id' => User::latest()->first(),
        ]);

        return redirect()->route('cashier.index')->with('success', 'Kasir berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cashier = Cashier::find($id); // Ambil semua cabang untuk dropdown
        return view('cashiers.show', compact('cashier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $branches = Branch::all(); // Ambil semua cabang untuk dropdown
        return view('cashiers.edit', compact('cashier', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:cashier',
            'password' => 'required|min:6',
            'phone_number' => 'required',
            'branch_id' => 'required|exists:branches,id',
        ]);

        Cashier::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'branch_id' => $request->branch_id,
        ]);

        return redirect()->route('cashier.index')->with('success', 'Kasir berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menghapus data kasir dari database
        Cashier::find($id)->delete();
        return redirect()->route('company.index')->with('success', 'Kasir berhasil dihapus.');
    }
}
