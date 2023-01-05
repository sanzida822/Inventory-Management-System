@extends('admin.admin_master')
@section('admin')
<div class="page-content">
                    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">All Invoice</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Print Invoice Table</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        




                    <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="invoice-title">
                                                    <h4 class="float-end font-size-16"><strong>Invoice No: #{{$invoice->invoice_no}}</strong></h4>
                                                    <h3>
                                                        Inventory Management 
                                                        <!-- <img src="assets/images/logo-sm.png" alt="logo" height="24"> -->
                                                    </h3>
                                                </div>
                                                <hr>
                                            
                                                <div class="row">
                                                    <div class="col-6 mt-4">
                                                        <address>
                                                            <strong>Inventory</strong><br>
                                                        sanzidasultana822@gmail.com<br>
                                                          Feni
                                                        </address>
                                                    </div>
                                                    <div class="col-6 mt-4 text-end">
                                                        <address>
                                                            <strong>Order Date</strong><br>
                                                            {{date('d-m-Y',strtotime($invoice->date))}}<br><br>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>Customer Invoice</strong></h3>
                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td><strong>Customer Name</strong></td>
                                                                    <td class="text-center"><strong>Customer Mobile</strong></td>
                                                                    <td class="text-center"><strong>Address</strong>
                                                                    </td>
                                                                
                                                                </tr>
                                                                </thead>
                                                                <tbody>
   @php
    $payment=App\Models\Payment::where('invoice_id',$invoice->id)->first(); 
   @endphp                     
              
                                                <tr>
                                                    
                                                    <td class="text-center">{{$payment['customer']['name']}}</td>
                                                    <td class="text-center">{{$payment['customer']['mobile_number']}}</td>
                                                    <td class="text-center">{{$payment['customer']['address']}}</td>
                                                </tr>
                                        
                                                </tbody>
                                            </table>
                                        </div>

                                      
                                    </div>
                                </div>
                                <div>
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>All Products</strong></h3>
                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>Sl No:</th>
                                                                    <th>Category</th>
                                                                    <th>Product Name</th>
                                                                    <th>Current Stock</th>
                                                                    <th>Quantity</th>
                                                                    <th>Unit Price</th>
                                                                    <th>Total Price</th>

                                                                </tr>
                                                             </thead>
                                                                <tbody style="">
                            @php
                                $total=0;
                            @endphp
                            @foreach ($invoice['invoice_detail'] as $key=>$data )
                            <tr>
                                    <input type="hidden" name="id" value="{{$invoice->id}}">
                                    <input type="hidden" name="category_id[]" value="{{$data->category_id}}">
                                    <input type="hidden" name="product_id[]" value="{{$data->product_id}}">
                                    
                                    <input type="hidden" name="selling_qty[{{$data->id}}]" value="{{$data->selling_qty}}">

                                    <td>{{$key+1}}</td>
                                    <td>{{$data['category']['name']}}</td>
                                    <td>{{$data['product']['name']}}</td>
                                    <td>{{$data['product']['quantity']}}</td>
                                    <td>{{$data['selling_qty']}}</td>
                                    <td>{{$data['id']}}</td>
                                    <td>{{$data['selling_price']}}</td>
                            </tr>
                               @php
                                   $total+=$data['selling_qty']*$data['unit_price'];
                               @endphp 
                            @endforeach
                            <hr>
                           
                            <tr>
                                <td colspan="6">
                                    Total Amount
                                </td>
                                <td>{{$total}}</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    Paid Amount
                                </td>
                                <td>{{$payment->paid_amount}}</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    Due Amoount
                                </td>
                                <td>{{$payment->due_amount}}</td>
                            </tr>
                          </tbody>
                                            </table>
                                        </div>

                                        <div class="d-print-none">
                                            <div class="float-end">
                                                <a href="" onclick="window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light ms-2">download</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- end row -->

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>

</div>

@endsection 