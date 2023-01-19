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
                                    <div class="card-body"  style="box-shadow: 4px 3px #18814b, -6px 0 0.4em #0080145e">
        <!-- <a href="{{route('invoice.print')}}" style="float:right" class="btn btn-dark btn-rounded waves-effect waves-light">Print Invoice</a> -->
                                     <br><br>
        <h4 class="card-title">Print Invoice Table</h4>
        
                                        <div class="table-responsive">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr style="cursor: pointer;">
                                                        <th>SL No</th>
                                                        <th>Customer Name</th>
                                                        <th>Invoice No</th>
                                                        <th>Date</th>
                                                        <th>Description</th>
                                                        <th>Amount</th>
                                                        <th>Action</th>
                                                                                              
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($alldata as $key=>$item)
                                                        <tr data-id="1" style="cursor: pointer;">
                                                        <td data-field="sl" style="width: 80px">{{$key+1}}</td>
                                                        <td data-field="name">{{$item['payment']['customer']['name']}}</td>
                                         
                                                        <td data-field="mobile">#{{$item->invoice_no}}</td>
                                                      
                                                        <td data-field="email">{{$item->date}}</td>   
                                                        <!-- strtime add baki -->
                                                        
                                                        <td data-field="address">{{$item->description}}</td>
                                                        <td data-field="name">{{$item['payment']['total_amount']}} Tk</td>
                                                        <td data-field="name">    <a style="background-color: #03237E;" href="{{route('invoice.pdf',$item->id)}}" id="" class="btn btn-danger sm" title="Delete
                                                            ">
                                                                <i  class="fa fa-print"></i>
                                                            </a></td>
                                                      
                                                    </tr>
                                                    @endforeach
                                                  
                                                  
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>

</div>

@endsection 