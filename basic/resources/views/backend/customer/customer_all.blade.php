@extends('admin.admin_master')
@section('admin')


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Customer</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Customer Table</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="box-shadow: 4px 3px #18814b, -6px 0 0.4em #0080145e">
                        <a href="{{route('customer.add')}}" style="float:right"
                            class="btn btn-success btn-rounded waves-effect waves-light">Add Customer</a>
                        <br><br>
                        <h4 class="card-title">Customer Table</h4>

                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr style="cursor: pointer;">
                                        <th>SL No</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Mobile No</th>
                                        <th>Email</th>
                                        <th>Address</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customer as $key=>$item)
                                    <tr data-id="1" style="cursor: pointer;">
                                        <td data-field="sl" style="width: 80px">{{$key+1}}</td>
                                        <td data-field="name">{{$item->name}}</td>
                                        <td><img src="{{asset($item->customer_image)}}" style="width:60px;height:70px"
                                                alt=""></td>
                                        <td data-field="mobile">{{$item->mobile_number}}</td>
                                        <td data-field="email">{{$item->email}}</td>
                                        <td data-field="address">{{$item->address}}</td>
                                        <td style="width: 100px">
                                            <a href="{{route('customer.edit',$item->id)}}" class="btn btn-info sm"
                                                title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <!-- <a href="{{route('customer.delete',$item->id)}}" id="delete"
                                                class="btn btn-danger sm" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a> -->
                                        </td>
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
<!-- 
<script>
    $('#datatable').DataTable( {
    responsive: true
} );
</script> -->
@endsection