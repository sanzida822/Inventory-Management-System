@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Stock Report</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Stock Tables</a></li>
                            <li class="breadcrumb-item active">Stock Report Table</li>
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

                        <a href="{{route('stock.report.print')}}" style="float:right"
                            class="btn btn-success btn-rounded waves-effect waves-light"><i class="fa fa-print"></i>
                            Print Stock Report</a>
                        <br><br>
                        <h4 class="card-title">Stock Table</h4>

                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr style="cursor: pointer;">
                                        <th>SL No</th>
                                        <th>Supplier Name</th>

                                        <th>Category</th>


                                        <th>Product Name</th>
                                        <th>Unit</th>
                                        <th>In Quantity</th>
                                        <th>Out Quantity</th>
                                        <th>Stock</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $key=>$item)
                                    @php
                                    $buying_qty=App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');
                                    $sellig_qty=App\Models\InvoiceDetail::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('selling_qty');
                                    @endphp


                                    <tr data-id="1" style="cursor: pointer;">
                                        <td data-field="sl" style="width: 80px" class="text-center">{{$key+1}}</td>
                                        <td data-field="name" class="text-center">{{$item['supplier']['name']}}</td>

                                        <td data-field="" class="text-center">{{$item['category']['name']}}</td>

                                        <td data-field="name" class="text-center">{{$item->name}}</td>
                                        <td data-field="name" class="" class="text-center">{{$item['unit']['name']}}
                                        </td>
                                        <td data-field="" class="text-center"><span
                                                class="btn btn-success">{{$buying_qty}} </span></td>
                                        <td data-field="" class="text-center"><span
                                                class="btn btn-success">{{$sellig_qty}}</span> </td>

                                        <td data-field="" class="text-center"><span
                                                class="btn btn-danger">{{$item->quantity}}</td></span>
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