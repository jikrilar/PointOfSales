<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductClassController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDepartmentController;
use App\Http\Controllers\ProductSubclassController;
use App\Http\Controllers\ReceivedController;
use App\Http\Controllers\SalesOrderController;
use App\Http\Controllers\TransferOrderController;
use App\Http\Controllers\SalesHistoryController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'login']);

Route::get('/product/{id}', [ProductController::class, 'show-detail'])->name('product.show-detail');

Route::get('/register', [AuthController::class, 'register']);

Route::get('/get-branch-info/{nik}', [CashierController::class, 'getBranchInfo']);

Route::get('/product/show/{id}', [ProductController::class, 'showdetail']);

// transaction route
Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index');
Route::post('/transaction/add', [TransactionController::class, 'addProduct'])->name('transaction.add');
Route::delete('/transaction/remove/{id}', [TransactionController::class, 'removeProduct'])->name('transaction.remove');
Route::get('/transaction/clear', [TransactionController::class, 'clearCart'])->name('transaction.clear');
Route::post('/transaction/update-quantity', [TransactionController::class, 'updateQuantity'])->name('transaction.updateQuantity');

Route::get('/check-product-barcode', [TransactionController::class, 'checkProductCode']);

// receipt route
Route::get('/receipt', [ReceiptController::class, 'index'])->name('receipt.index');


// sales history route
Route::get('/sales-history', [SalesHistoryController::class, 'index'])->name('sales-history.index');
Route::get('/sales-history/{branch}', [SalesHistoryController::class, 'show'])->name('sales-history.show');

Route::resource('customer', CustomerController::class);

Route::resource('product', ProductController::class);

Route::resource('company', CompanyController::class);

Route::resource('vendor', VendorController::class);

Route::resource('branch', BranchController::class);

Route::resource('cashier', CashierController::class);

Route::resource('brand', BrandController::class);

Route::resource('inventory', InventoryController::class);

Route::resource('discount', DiscountController::class);

Route::resource('received', ReceivedController::class);

Route::get('payment/index', [PaymentController::class, 'index'])->name('payment.index');

Route::resource('product-department', ProductDepartmentController::class);

Route::resource('product-class', ProductClassController::class);

Route::resource('product-subclass', ProductSubclassController::class);

Route::resource('transfer-order', TransferOrderController::class);

Route::resource('sales-order', SalesOrderController::class);
