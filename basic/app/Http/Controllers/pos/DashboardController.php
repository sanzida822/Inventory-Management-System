<?php

namespace App\Http\Controllers\pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\InvoiceDetail;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function GetTotalCustomer(){
    $allCustomer=Customer::count();
    dd($allCustomer);


    }
}