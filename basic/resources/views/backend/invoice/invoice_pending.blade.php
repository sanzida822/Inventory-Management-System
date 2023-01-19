@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Pending Invoice</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Invoice Pending Table</li>
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
                        <a href="{{route('invoice.add')}}" style="float:right"
                            class="btn btn-success btn-rounded waves-effect waves-light">Add Invoice</a>
                        <br><br>
                        <h4 class="card-title">Invoice Pending Table</h4>

                        <div class="table-responsive">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr style="cursor: pointer;">
                                        <th>SL No</th>
                                        <th>Customer Name</th>
                                        <th>Invoice No</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php

                                    @endphp
                                    @foreach($alldata as $key=>$item)

                                    <tr data-id="1" style="cursor: pointer;">
                                        <td data-field="sl" style="width: 80px">{{$key+1}}</td>
                                        <td data-field="name">{{$item['payment']['customer']['name']}}</td>

                                        <td data-field="mobile">#{{$item->invoice_no}}</td>

                                        <td data-field="email">{{$item->date}}</td>
                                        <!-- strtime add baki -->

                                        <td data-field="address">{{$item->description}}</td>
                                        <td data-field="name">{{$item['payment']['total_amount']}} Tk</td>

                                        @if($item->status=='0')
                                        <td data-field=""><span class="btn btn-warning">Pending</span></td>

                                        @elseif($item->status=='1')
                                        <td data-field=""><span class="btn btn-success">Approved</span></td>
                                        @endif

                                        @if($item->status=='0')
                                        <td style="width: 100px">

                                            <a href="{{route('invoice.approve',$item->id)}}" id=""
                                                class="btn btn-dark sm" title="Approved
                                                            ">
                                                <i class="fas fa-check-circle"></i>
                                            </a>


                                            <a href="{{route('invoice.delete',$item->id)}}" id="approve"
                                                class="btn btn-danger sm" title="Delete
                                                            ">
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