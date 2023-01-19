@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>


                </div>
            </div>
        </div>
        <!-- end page title -->
        @php
        $totalCustomer=\App\Models\Customer::count();
        $totalSupplier=\App\Models\Supplier::count();
        $totalProduct=\App\Models\Product::count();
        $totalCategory=\App\Models\Category::count();
        $totalPurchase=\App\Models\Purchase::where('status',1)->sum('buying_price');
        $totalSales=\App\Models\InvoiceDetail::where('status',1)->sum('selling_price');
        $totalPaidAmount=\App\Models\Payment::sum('paid_amount');
        $totalDueAmount=\App\Models\Payment::sum('due_amount');
        $totalOrders=\App\Models\Invoice::count();
        @endphp
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card" style="height:150px;">
                    <div class="card-body" style="background-color: #5ff4a35c;">
                        <div class="d-flex">
                            <div class="flex-grow-1">

                                <h4 class="mb-2">{{$totalCustomer}}</h4>
                                <p class="text-truncate font-size-17 mb-2 " style="font-weight: 550;">Total Customers
                                </p>

                                <a href="{{route('customer.all')}}" id=""
                                    class="w-100 position-absolute bottom-0 start-50 translate-middle-x  btn btn-sm"
                                    title="" style="background-color: #1f9e6ddb;">
                                    <i class="ri-arrow-right-line" style="font-size: 17px;font-weight:700;color:#fff">
                                    </i>
                                </a>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-user-3-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card" style="height:150px;">
                    <div class="card-body" style="background-color: #5ff4a35c;">
                        <div class="d-flex">
                            <div class="flex-grow-1">

                                <h4 class="mb-2">{{$totalSupplier}}</h4>
                                <p class="text-truncate font-size-17 mb-2 " style="font-weight: 550;">Total Suppliers
                                </p>

                                <a href="{{route('supplier.all')}}" id=""
                                    class="w-100 position-absolute bottom-0 start-50 translate-middle-x  btn btn-sm"
                                    title="" style="background-color: #1f9e6ddb;">
                                    <i class="ri-arrow-right-line" style="font-size: 17px;font-weight:700;color:#fff">
                                    </i>
                                </a>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-file-user-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card" style="height:150px;">
                    <div class="card-body" style="background-color: #5ff4a35c;">
                        <div class="d-flex">
                            <div class="flex-grow-1">

                                <h4 class="mb-2">{{$totalCategory}}</h4>
                                <p class="text-truncate font-size-17 mb-2 " style="font-weight: 550;">Total Categories
                                </p>

                                <a href="{{route('category.all')}}" id=""
                                    class="w-100 position-absolute bottom-0 start-50 translate-middle-x  btn btn-sm"
                                    title="" style="background-color: #1f9e6ddb;">
                                    <i class="ri-arrow-right-line" style="font-size: 17px;font-weight:700;color:#fff">
                                    </i>
                                </a>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-bilibili-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card" style="height:150px;">
                    <div class="card-body" style="background-color: #5ff4a35c;">
                        <div class="d-flex">
                            <div class="flex-grow-1">

                                <h4 class="mb-2">{{$totalProduct}}</h4>
                                <p class="text-truncate font-size-17 mb-2 " style="font-weight: 550;">Total Products
                                </p>

                                <a href="{{route('product.all')}}" id=""
                                    class="w-100 position-absolute bottom-0 start-50 translate-middle-x  btn btn-sm"
                                    title="" style="background-color: #1f9e6ddb;">
                                    <i class="ri-arrow-right-line" style="font-size: 17px;font-weight:700;color:#fff">
                                    </i>
                                </a>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-shopping-bag-3-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card" style="height:150px;">
                    <div class="card-body" style="background-color: #5ff4a35c;">
                        <div class="d-flex">
                            <div class="flex-grow-1">

                                <h5 class="mb-2" style="font-weight:;">{{$totalOrders}}</h5>
                                <p class="text-truncate font-size-17 mb-2 " style="font-weight: 550;">Total Orders
                                </p>

                                <a href="{{route('invoice.all')}}" id=""
                                    class="w-100 position-absolute bottom-0 start-50 translate-middle-x  btn btn-sm"
                                    title="" style="background-color: #1f9e6ddb;">
                                    <i class="ri-arrow-right-line" style="font-size: 17px;font-weight:700;color:#fff">
                                    </i>
                                </a>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-vip-diamond-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->



            <div class="col-xl-3 col-md-6">
                <div class="card" style="height:150px;">
                    <div class="card-body" style="background-color: #5ff4a35c;">
                        <div class="d-flex">
                            <div class="flex-grow-1">

                                <h5 class="mb-2" style="font-weight: 600;">{{$totalPurchase}} Tk</h5>
                                <p class="text-truncate font-size-17 mb-2 " style="font-weight: 550;">Total Purchases
                                </p>

                                <a href="{{route('purchase.all')}}" id=""
                                    class="w-100 position-absolute bottom-0 start-50 translate-middle-x  btn btn-sm"
                                    title="" style="background-color: #1f9e6ddb;">
                                    <i class="ri-arrow-right-line" style="font-size: 17px;font-weight:700;color:#fff">
                                    </i>
                                </a>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-shopping-cart-2-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->



            <div class="col-xl-3 col-md-6">
                <div class="card" style="height:150px;">
                    <div class="card-body" style="background-color: #5ff4a35c;">
                        <div class="d-flex">
                            <div class="flex-grow-1">

                                <h5 class="mb-2" style="font-weight: 600;">{{$totalPaidAmount}} Tk</h5>
                                <p class="text-truncate font-size-17 mb-2 " style="font-weight: 550;">Total Paid Amount
                                </p>

                                <a href="{{route('customer.paid')}}" id=""
                                    class="w-100 position-absolute bottom-0 start-50 translate-middle-x  btn btn-sm"
                                    title="" style="background-color: #1f9e6ddb;">
                                    <i class="ri-arrow-right-line" style="font-size: 17px;font-weight:700;color:#fff">
                                    </i>
                                </a>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-currency-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card" style="height:150px;">
                    <div class="card-body" style="background-color: #5ff4a35c;">
                        <div class="d-flex">
                            <div class="flex-grow-1">

                                <h5 class="mb-2" style="font-weight: 600;">{{$totalDueAmount}} Tk</h5>
                                <p class="text-truncate font-size-17 mb-2 " style="font-weight: 550;">Total Due Amount
                                </p>

                                <a href="{{route('customer.credit')}}" id=""
                                    class="w-100 position-absolute bottom-0 start-50 translate-middle-x  btn btn-sm"
                                    title="" style="background-color: #1f9e6ddb;">
                                    <i class="ri-arrow-right-line" style="font-size: 17px;font-weight:700;color:#fff">
                                    </i>
                                </a>

                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class=" ri-coins-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->




    </div>

    @endsection