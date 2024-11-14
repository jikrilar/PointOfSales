<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Voucher;
use App\Models\PaymentMethod;
use Carbon\Carbon;
use Session;

class TransactionController extends Controller
{
    public function checkProductCode(Request $request)
    {
        $barcode = $request->input('product_barcode');
        $exists = Product::where('barcode', $barcode)->exists();

        return response()->json(['exists' => $exists]);
    }


    public function generateinvoiceCode($cashierId, $branchCode)
    {
        // Mendapatkan waktu sekarang
        $currentDateTime = Carbon::now();

        // Format tanggal dan waktu transaksi
        $transactionDate = $currentDateTime->format('Ymd'); // Format: YYYYMMDD
        $transactionTime = $currentDateTime->format('His'); // Format: HHMMSS

        // Menggabungkan format invoice code
        $invoiceCode = "{$transactionDate}-{$transactionTime}-{$cashierId}-{$branchCode}";

        return $invoiceCode;
    }

    public function getBranchId()
    {
        // Mendapatkan user yang sedang login
        $user = auth()->user();

        // Mengambil branch_id dari relasi cashier
        $branchId = $user->cashier->branch_id ?? null;

        return $branchId;
    }

    public function index()
    {
        $cashier = auth()->user();
        $branchCode = $this->getBranchId();
        $invoiceNumber = Invoice::latest()->value('id') + 1;
        $customers = Customer::all();
        $products = Product::all();
        $invoiceCode = $this->generateInvoiceCode($cashier->id, $branchCode);
        $cart = Session::get('cart', []);
        $total = array_reduce($cart, function ($sum, $item) {
            return $sum + $item['subtotal'];
        }, 0);

        return view('transaction', compact('cart', 'total', 'products', 'customers', 'invoiceCode', 'invoiceNumber'));
    }

    public function addProduct(Request $request)
    {
        $productBarcode = $request->input('product_barcode');
        $product = Product::where('barcode', $productBarcode)->first();

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['qty']++;
            $cart[$product->id]['subtotal'] = $cart[$product->id]['qty'] * $cart[$product->id]['price'];
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'image' => $product->picture,
                'code' => $product->barcode,
                'name' => $product->fldesc,
                'price' => $product->price->discount_price,
                'qty' => 1,
                'subtotal' => $product->price
            ];
        }

        Session::put('cart', $cart);
        return redirect()->route('transaction.index');
    }

    public function removeProduct($id)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->route('transaction.index');
    }

    public function updateQuantity(Request $request)
    {
        $id = $request->input('id');
        $amount = $request->input('amount');

        // Cari item dalam keranjang berdasarkan ID
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            // Perbarui jumlah barang
            $cart[$id]['qty'] += $amount;

            // Pastikan qty tidak kurang dari 1
            if ($cart[$id]['qty'] < 1) {
                $cart[$id]['qty'] = 1;
            }

            // Hitung ulang subtotal
            $cart[$id]['subtotal'] = $cart[$id]['price'] * $cart[$id]['qty'];

            // Simpan kembali cart ke session
            session()->put('cart', $cart);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Item tidak ditemukan']);
    }
    public function clearCart()
    {
        Session::forget('cart');
        return redirect()->route('transaction.index');
    }

    public function applyVoucher(Request $request)
    {
        $code = $request->input('voucher_code');
        $total = $request->input('total');

        // Cari voucher berdasarkan kode
        $voucher = Voucher::where('code', $code)->first();

        if (!$voucher) {
            return response()->json(['error' => 'Voucher tidak ditemukan.'], 404);
        }

        // Validasi status, periode, dan penggunaan voucher
        if (
            $voucher->status !== 'active' ||
            $voucher->start_date > now() ||
            $voucher->end_date < now() ||
            $voucher->times_used >= $voucher->usage_limit
        ) {
            return response()->json(['error' => 'Voucher tidak valid atau telah habis digunakan.'], 400);
        }

        // Hitung potongan harga
        $discount = 0;
        if ($voucher->discount_amount) {
            $discount = $voucher->discount_amount;
        } elseif ($voucher->discount_percentage) {
            $discount = ($voucher->discount_percentage / 100) * $total;
        }

        // Update penggunaan voucher
        $voucher->increment('times_used');

        // Kembalikan hasil ke frontend
        return response()->json([
            'success' => true,
            'discount' => $discount,
            'new_total' => $total - $discount
        ]);
    }

}
