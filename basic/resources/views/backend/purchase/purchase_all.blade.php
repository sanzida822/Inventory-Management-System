@extends('admin.admin_master')
@section('admin')
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">All Purchase</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Purchase Table</li>
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
        <a href="{{route('purchase.add')}}" style="float:right" class="btn btn-dark btn-rounded waves-effect waves-light">Add Purchase</a>
                                     <br><br>
        <h4 class="card-title">Purchase Table</h4>
        
                                        <div class="table-responsive">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr style="cursor: pointer;">
                                                        <th>SL No</th>
                                                        <th>Purchase No</th>
                                                        <th>Date</th>
                                                        <th>Supplier</th>
                                                        <th>Category</th>
                                                        <th>Quantity</th>
                                                        <th>Product Name</th>
                                                        <th>Status</th>
                    
                                                        <th>Action</th>
                                                   
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($alldata as $key=>$item)
                                                        <tr data-id="1" style="cursor: pointer;">
                                                        <td data-field="sl" style="width: 80px">{{$key+1}}</td>
                                                        <td data-field="name">{{$item->purchase_no}}</td>
                                                        <td data-field="name">{{date('d-m-y',strtotime($item->date))}}</td>
                                                        <td data-field="">{{$item['supplier']['name']}}</td>
                                                        <td data-field="">{{$item['category']['name']}}</td>
                                                        <td data-field="name">{{$item->buying_qty}}</td>
                                                        <td data-field="email">{{$item['product']['name']}}</td>
                                                        @if($item->status=='0')
                                                        <td data-field=""><span class="btn btn-warning">Pending</span></td>

                                                        @elseif($item->status=='1')
                                                        <td data-field=""><span class="btn btn-success">Approved</span></td>
                                                        @endif

                                                        @if($item->status=='0')   
                                                        <td style="width: 100px">
                                                            
                                                            <a href="{{route('purchase.delete',$item->id)}}" id="delete" class="btn btn-danger sm" title="Delete">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </a>
                                                        </td>
                                                        @endif
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