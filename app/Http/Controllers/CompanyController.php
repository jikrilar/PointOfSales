<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data perusahaan dari database
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form untuk menambah data perusahaan baru
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|unique:companies,email',
            'bank' => 'required|string|max:100',
            'account_number' => 'required|string|unique:companies,account_number|max:20',
            'account_name' => 'required|string|max:255',
            'vat' => 'required',
            'tax_number' => 'nullable|string|unique:companies,tax_number|max:20',
        ]);

        // Menyimpan data perusahaan baru ke database
        Company::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'bank' => $request->input('bank'),
            'account_number' => $request->input('account_number'),
            'account_name' => $request->input('account_name'),
            'vat' => $request->input('vat') ?? false,
            'tax_number' => $request->input('tax_number'),
        ]);

        return redirect()->route('company.index')->with('success', 'Company berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan detail perusahaan
        $company = Company::find($id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Menampilkan form untuk mengedit data perusahaan
        $company = Company::find($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|unique:companies,email',
            'bank' => 'required|string|max:100',
            'account_number' => 'required|string|unique:companies,account_number|max:20',
            'account_name' => 'required|string|max:255',
            'vat' => 'required',
            'tax_number' => 'nullable|string|unique:companies,tax_number|max:20',
        ]);

        // Mengupdate data perusahaan
        Company::find($id)->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'bank' => $request->input('bank'),
            'account_number' => $request->input('account_number'),
            'account_name' => $request->input('account_name'),
            'vat' => $request->input('vat') ?? false,
            'tax_number' => $request->input('tax_number'),
        ]);

        return redirect()->route('company.index')->with('success', 'Company berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menghapus data perusahaan dari database
        Company::find($id)->delete();
        return redirect()->route('company.index')->with('success', 'Company berhasil dihapus.');
    }
}
