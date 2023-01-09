@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                            <li class="breadcrumb-item active">Customer Invoice </li>
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
                                    <h4 class="float-end font-size-16"><strong>Invoice No:
                                            #{{$payment['invoice']['invoice_no']}}</strong></h4>

                                </div>
                                <hr>


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
                                                        <td class="text-center"><strong>Customer Name</strong></td>
                                                        <td class="text-center"><strong>Customer Mobile</strong></td>
                                                        <td class="text-center"><strong>Address</strong>
                                                        </td>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $payment=App\Models\Payment::where('invoice_id',$payment->invoice_id)->first();
                                                    @endphp

                                                    <tr>

                                                        <td class="text-center">{{$payment['customer']['name']}}</td>
                                                        <td class="text-center">
                                                            {{$payment['customer']['mobile_number']}}</td>
                                                        <td class="text-center">{{$payment['customer']['address']}}</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                </div>
                                <div>
                                    <form method="post" action="{{ route('customer.update.invoice.part') }}" id="myForm"
                                        enctype="multipart/form-data">
                                        @csrf


                                        <div>



                                            <input type="hidden" name="invoice_id" value="{{$payment->invoice_id}}">

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

                                                            $invoice_detail=App\Models\InvoiceDetail::where('invoice_id',$payment->invoice_id)->get();


                                                            $total=0;

                                                            @endphp
                                                            @foreach ($invoice_detail as $key=>$data )




                                                            <tr>


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
                                                                    Due Amount
                                                                </td>
                                                                <td name="" value="">{{$payment->due_amount}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>


                                            </div>

                                            <div class="row">

                                                <div class="form-group col-md-3">
                                                    <input type="hidden" name="prev_due_amount"
                                                        value="{{$payment->due_amount}}">
                                                    <label for="">Paid Status</label>
                                                    <select name="payment_status" id="payment_status"
                                                        class="payment_status form-select select2">
                                                        <option value="">Select Status</option>
                                                        <option value="Full_Paid">Full Paid</option>
                                                        <option value="Partial_Paid">Partial Paid</option>

                                                    </select>

                                                </div>




                                                <div class="col-md-3">
                                                    <label for=""> </label>
                                                    <input class="form-control" id="date" name="date" type="date"
                                                        value="{{$payment['invoice']['date']}}">
                                                </div>


                                                <div class="col-md-3">
                                                    <label for=""> </label>
                                                    <br>
                                                    <button type="submit" class="btn btn-info">Invoice Update</button>
                                                </div>

                                            </div>
                                            <br>
                                            <div class="col-md-3 ">
                                                <input type="text" name="partial_amount" value="0"
                                                    class="form-control partial_amount" value=""
                                                    placeholder="Enter paid amount" style="display:none">

                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div> <!-- end row -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script type="text/javascript">
    $(document).ready(function() {

        $(document).on('change', '.payment_status', function() {

            var paid_status = $(this).val();

            if (paid_status == "Partial_Paid") {
                $('.partial_amount').show();
            } else {
                $('.partial_amount').hide();
            }
        });
    })
    </script>
    @endsection