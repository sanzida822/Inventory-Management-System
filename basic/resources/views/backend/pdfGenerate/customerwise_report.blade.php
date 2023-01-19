@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Customer Report</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Customer Report</li>
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

                                            <strong>Time:</strong><br>
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
                                        <h3 class="font-size-16"><strong>Customer Report</strong></h3>
                                    </div>
                                    <div class="">

                                        @if($alldata->isEmpty())
                                        <p class="fs-4 fw-bold d-flex justify-content-center">No data available</p>


                                        @else
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>

                                                    <tr>
                                                        <td class="text-center"><strong>SL No</strong></td>
                                                        <td class="text-center"><strong>Customer Name</strong></td>
                                                        <td class="text-center"><strong>Invoice No</strong></td>
                                                        <td class="text-center"><strong>Date</strong>
                                                        </td>
                                                        <td class="text-center"><strong>Total Amount</strong>
                                                        </td>
                                                        <td class="text-center"><strong>Paid Amount</strong>
                                                        </td>
                                                        <td class="text-center"><strong>Due Amount</strong>
                                                        </td>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($alldata as $key=>$data )

                                                    <tr>
                                                        <td class="text-center">{{$key+1}}</td>
                                                        <td class="text-center">{{$data['customer']['name']}}</td>
                                                        <td class="text-center">{{$data['invoice']['invoice_no']}}</td>
                                                        <td class="text-center">
                                                            {{date('d-m-Y',strtotime($data['invoice']['date']))}}
                                                        </td>
                                                        <td class="text-center">{{$data->total_amount}}</td>
                                                        <td class="text-center">{{$data->paid_amount}}</td>
                                                        <td class="text-center">{{$data->due_amount}}</td>


                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div>





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