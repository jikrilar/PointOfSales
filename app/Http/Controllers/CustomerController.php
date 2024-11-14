<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data customer dari database
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat customer baru
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'ktp_number' => 'required|string|unique:customers,ktp_number|max:20',
            'ktp_photo' => 'required|image|max:2048',
            'photo' => 'nullable|image|max:2048',
            'email' => 'required|string|email|max:255|unique:customers,email',
            'phone_number' => 'required|string|max:15',
            'birthday' => 'required|date',
        ]);

        // Upload file foto KTP
        if ($request->hasFile('ktp_photo')) {
            $ktpPhotoPath = $request->file('ktp_photo')->store('ktp_photos', 'public');
        }

        // Upload file foto profil jika ada
        if ($request->hasFile('photo')) {
            $profilePhotoPath = $request->file('photo')->store('profile_photos', 'public');
        }

        // Simpan data customer baru ke database
        Customer::create([
            'name' => $request->input('name'),
            'ktp_number' => $request->input('ktp_number'),
            'ktp_photo' => $ktpPhotoPath ?? null,
            'photo' => $profilePhotoPath ?? null,
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'birthday' => $request->input('birthday'),
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tampilkan detail customer
        $customer = Customer::find($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Tampilkan form untuk mengedit data customer
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'ktp_number' => 'required|string|max:20|unique:customers,ktp_number',
            'ktp_photo' => 'nullable|image|max:2048',
            'photo' => 'nullable|image|max:2048',
            'email' => 'required|string|email|max:255|unique:customers,email',
            'phone_number' => 'required|string|max:15',
            'birthday' => 'required|date',
        ]);

        // Upload file foto KTP jika ada
        if ($request->hasFile('ktp_photo')) {
            $ktpPhotoPath = $request->file('ktp_photo')->store('ktp_photos', 'public');
        }

        // Upload file foto profil jika ada
        if ($request->hasFile('photo')) {
            $profilePhotoPath = $request->file('photo')->store('profile_photos', 'public');
        }

        // Update data customer
        Customer::find($id)->update([
            'name' => $request->input('name'),
            'ktp_number' => $request->input('ktp_number'),
            'ktp_photo' => $ktpPhotoPath,
            'photo' => $profilePhotoPath,
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'birthday' => $request->input('birthday'),
        ]);

        return redirect()->route('customer.index')->with('success', 'Customer berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data customer dari database
        Customer::find($id)->delete();
        return redirect()->route('customer.index')->with('success', 'Customer berhasil dihapus.');
    }
}
