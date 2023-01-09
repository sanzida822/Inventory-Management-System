@extends('admin.admin_master')
@section('admin')


<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">credit customer</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                            <li class="breadcrumb-item active">Credit Customer Table</li>
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
                                     <br><br>
        <h4 class="card-title">Credit Customer Table</h4>
        
                                        <div class="table-responsive">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr style="cursor: pointer;">
                                                        <th>SL No</th>
                                                        <th>Customer Name</th>
                                                        <th>Invoice No</th>
                                                        <th>Date</th>
                                                        <th>Due Amount</th>
                                                  
                    
                                                        <th>Action</th>
                                                   
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $totalAmount=0;
                                                    @endphp
                                                    @foreach($alldata as $key=>$item)
                                                    @php
                                                    $totalAmount+=$item->due_amount;
                                                    @endphp
                                                        <tr data-id="1" style="cursor: pointer;">
                                                        <td data-field="sl" style="width: 80px">{{$key+1}}</td>
                                                        <td data-field="name">{{$item['customer']['name']}}</td>
                                                        <td data-field="mobile">{{$item['invoice']['invoice_no']}}</td>
                                                        <td data-field="email">{{date('d-m-Y',strtotime($item['invoice']['date']))}}</td>
                                                        <td data-field="address">{{$item->due_amount}}</td>
                                                        <td style="width: 100px">
                                                            <a  href="{{route('customer.edit.invoice',$item->invoice_id)}}" class="btn btn-info sm" title="Edit">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </a>
                                                            <a href="{{route('customer.delete',$item->id)}}" id="" class="btn btn-danger sm" title="Customer Edit Invoice">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td>Grand Total</td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td colspan="4">{{$totalAmount}}</td>
                                                    </tr>
                                                  
                                                  
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
<!-- 
<script>
    $('#datatable').DataTable( {
    responsive: true
} );
</script> -->
@endsection 