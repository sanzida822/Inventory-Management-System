@extends('admin.admin_master')
@section('admin')
<div class="page-content">
                    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Purchase Report</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Print Purchase Table</li>
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
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>Daily Purchase Report</strong>
                                                  
                                                    </div>
                                                    <span class="btn btn-dark">{{date('d-m-Y',strtotime($sdate))}}</span></h3>
                                                    <span class="btn btn-info">-</span></h3>
                                                    <span class="btn btn-success">{{date('d-m-Y',strtotime($edate))}}</span></h3>
                                                    <div class="">
                                                    
                                                            
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
                                                                    <th>date</th>
                                                                    <th>Purchase No</th>
                                                                    <th>Supplier Name</th>
                                                                    <th>Product Name</th>
                                                                    <th>Quantity</th>
                                                                    <th>Category Name</th>
                                                                  
                                                                    
                                                                <th>Buying Quantity</th>
                                                                <th>Buying Price</th>
                                                                 

                                                                </tr>
                                                             </thead>
                                                                <tbody style="">
                            @php
                                $total=0;
                            @endphp
                            @foreach ($details as $key=>$data )
                            <tr>
                              
                                   

                                    <td class="text-center">{{$key+1}}</td>
                                    <td class="text-center">{{date('d-m-Y',strtotime($data->date))}}</td>
                                    <td class="text-center"># {{$data->purchase_no}}</td>
                                  
                                    <td class="text-center">{{$data['supplier']['name']}}</td>
                                    
                                    <td class="text-center">{{$data['product']['name']}}</td>
                                    <td class="text-center"># {{$data->quantity}}</td>

                                    <td class="text-center">{{$data['category']['name']}}</td>
                                  
                                    <td class="text-center">{{$data->buying_qty}}</td>
                                    <td class="text-center">{{$data->buying_price}}</td>
                                    @php
                                    $total+=$data->buying_price;
                                    @endphp
                                 

                            </tr>
                              
                            @endforeach
                            <hr>
                           
                            <tr>
                                <td colspan="8">
                                    Total Amount
                                </td>
                                <td>{{$total}}</td>
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