<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\pos\AjxController;
use App\Http\Controllers\pos\CategoryController;
use App\Http\Controllers\pos\SupplierController;
use App\Http\Controllers\pos\CustomerController;
use App\Http\Controllers\pos\ManageInvoiceController;
use App\Http\Controllers\pos\ManageStockController;
use App\Http\Controllers\pos\ProductController;
use App\Http\Controllers\pos\PurchaseController;
use App\Http\Controllers\pos\UnitController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});

Route::middleware('auth')->group(function(){  
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier/all', 'SupplierAll')->name('supplier.all');
    Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add');
    Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');
    Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit');
    Route::post('/supplier/update', 'SupplierUpdate')->name('supplier.update');
    Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');
});
// customer controller
Route::controller(CustomerController::class)->group(function () {

    Route::get('/customer/all', 'CustomerAll')->name('customer.all');

    Route::get('/customer/add', 'CustomerAdd')->name('customer.add'); //go to add page
    Route::post('/customer/store', 'CustomerStore')->name('customer.store'); //store customer data
    Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
    Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');
    Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');
    Route::get('/customer/credit', 'CustomerCredit')->name('customer.credit');
    Route::get('/customer/edit/invoice/{invoice_id}', 'CustomerEditInvoice')->name('customer.edit.invoice');
    Route::post('/customer/update/invoice/part/', 'CustomerUpdateInvoice')->name('customer.update.invoice.part');

});




// Unit controller
Route::controller(UnitController::class)->group(function () {
    Route::get('/unit/all', 'UnitAll')->name('unit.all');
    Route::get('/unit/add', 'UnitAdd')->name('unit.add'); //go to add page
    Route::post('/unit/store', 'UnitStore')->name('unit.store'); //store unit data
    Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
    Route::post('/unit/update', 'UnitUpdate')->name('unit.update');
    Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete');
});


// Category controller
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category/all', 'CategoryAll')->name('category.all');
    Route::get('/category/add', 'CategoryAdd')->name('category.add'); //go to add page
    Route::post('/category/store', 'CategoryStore')->name('category.store'); //store category data
    Route::get('/category/edit/{id}', 'CategoryEdit')->name('category.edit');
    Route::post('/category/update', 'CategoryUpdate')->name('category.update');
    Route::get('/category/delete/{id}', 'CategoryDelete')->name('category.delete');
});

// Product controller
Route::controller(ProductController::class)->group(function () {
    Route::get('/product/all', 'ProductAll')->name('product.all');
    Route::get('/product/add', 'ProductAdd')->name('product.add'); //go to add page
    Route::post('/product/store', 'ProductStore')->name('product.store'); //store category data
    Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');
    Route::post('/product/update', 'ProductUpdate')->name('product.update');
    Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');
});

// Ajax controller
Route::controller(AjxController::class)->group(function () {
    Route::get('/getcategory', 'GetCategory')->name('getCategory');
    Route::get('/getProduct', 'GetProduct')->name('getProduct');
    Route::get('/getStock', 'GetProductStrock')->name('getStock');

    //   Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add'); //go to add page
    // Route::post('/product/store', 'ProductStore')->name('product.store'); //store category data
    //  Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');
    //  Route::post('/product/update', 'ProductUpdate')->name('product.update');
    // Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');



});

// Invoice controller
Route::controller(ManageInvoiceController::class)->group(function () {
    Route::get('/invoice/all', 'InvoiceAll')->name('invoice.all');
    Route::get('/invoice/pending', 'InvoicePending')->name('invoice.pending');
    Route::get('/invoice/add', 'InvoiceAdd')->name('invoice.add'); //go to add page
    Route::post('/invoice/store', 'StoreInvoicedata')->name('storeinvoicedata'); //store category data
    Route::get('/invoice/approve/{id}', 'InvoiceApprove')->name('invoice.approve');
    //     //  Route::post('/product/update', 'ProductUpdate')->name('product.update');
    Route::get('/invoice/delete/{id}', 'InvoiceDelete')->name('invoice.delete');
    Route::post('/stock/check/', 'StockCheck')->name('stock.check');
    Route::get('/invoice/print/', 'InvoicePrint')->name('invoice.print');
    Route::get('/invoice/pdf/{id}', 'InvoicePdfPrint')->name('invoice.pdf');
    Route::get('/daily/invoice/report/', 'DailyInvoiceReport')->name('dailyinvoice.report');
    Route::get('/daily/invoice/pdf/', 'DailyInvoicePdf')->name('dailyinvoice.pdf');
   
});

//SStock Controller
Route::controller(ManageStockController::class)->group(function () {
    Route::get('/stock/report', 'StockReport')->name('stock.report');
     Route::get('/stock/report/print', 'StockReportPrint')->name('stock.report.print');

     Route::get('/product/stock/report', 'ProductStockReport')->name('product.stock.report');
    
     Route::get('/product/stock/report/print', 'ProductStockReportPrint')->name('product.stock.report.print');
   

});


// Purchase controller
Route::controller(PurchaseController::class)->group(function () {
    Route::get('/purchase/all', 'PurchaseAll')->name('purchase.all');
    Route::get('/purchase/pending', 'PurchasePending')->name('purchase.pending');
    Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add'); //go to add page
    Route::post('/purchase/store', 'PurchaseStore')->name('storepurchasedata'); //store category data
    Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');
    //  Route::post('/product/update', 'ProductUpdate')->name('product.update');
    Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');
    
    Route::get('/daily/purchase/report', 'DailyPurchaseReport')->name('daily.purchase.report'); //go to add page
   
    Route::get('/daily/purchase/report/pdf', 'DailyPurchaseReportPDF')->name('dailypurchase.pdf'); 
});

} );
// Admin All Route 
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });