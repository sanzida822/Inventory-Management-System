@extends('admin.admin_master')
@section('admin')
<div class="page-content">
                    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Stock Invoice</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Print Product Report</li>
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
                                                    <h4 class="float-end font-size-16"><strong></strong></h4>
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
                                                            
                                                            <strong>Printing Time:</strong><br>
                                                            @php
                                                            $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
                                                         
                                                            @endphp
                                                            {{$dt->format('F j, Y, g:i a');}}
                                                          <br><br>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>Stock Report</strong></h3>
                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                <td class="text-center"><strong>SL No</strong></td>
                                                                    <td class="text-center"><strong>Supplier Name</strong></td>
                                                                    <td class="text-center"><strong>Category</strong></td>
                                                                    <td class="text-center"><strong>Product Name</strong>
                                                                    </td>
                                                                    <td class="text-center"><strong>Unit</strong>
                                                                    </td>
                                                                    <td class="text-center"><strong>Stock</strong>
                                                                    </td>
                                                                
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach ($product as $key=>$data )
              
                                                <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                    <td class="text-center">{{$data['supplier']['name']}}</td>
                                                    <td class="text-center">{{$data['category']['name']}}</td>
                                                    <td class="text-center">{{$data->name}}</td>
                                                    <td class="text-center">{{$data['unit']['name']}}</td>
                                                    <td class="text-center">{{$data->quantity}}</td>  
                                               
                                                 
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                      
                                    </div>
                                </div>
                                <div>
                                             
                                                   
                          

                                        <div class="d-print-none">
                                            <div class="float-end">
                                                <a href="" onclick="window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="#" class="btn btn-primary waves-effect waves-light ms-2">download</a>
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