@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Invoice Approve</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Approve Invoice</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        @php
        $payment=App\Models\Payment::where('invoice_id',$invoice->id)->first();
        @endphp
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="box-shadow: 4px 3px #18814b, -6px 0 0.4em #0080145e">
                        <h5>#{{$invoice->invoice_no}} date:{{date('d-m-Y',strtotime('$invoice->date'))}}</h5>
                        <a href="{{route('invoice.pending')}}" style="float:right"
                            class="btn btn-success btn-rounded waves-effect waves-light">
                            Pending
                            Invoice List</a>
                        <br><br>

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>

                                    <th scope="col">
                                        <p style="font-weight:600;">Customer Name: {{$payment['customer']['name']}}</p>
                                    </th>
                                    <th scope="col">
                                        <p style="font-weight:600;">Customer Mobile:
                                            {{$payment['customer']['mobile_number']}}</p>
                                    </th>

                                    <th scope="col">
                                        <p style="font-weight:600;">Customer Gmail: {{$payment['customer']['email']}}
                                        </p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td colspan="3">{{$invoice->description}}</td>

                                </tr>



                            </tbody>
                        </table>
                        <form action="{{route('stock.check')}}" method="post">
                            @csrf
                            <table border="1" width="100%">
                                <thead style="background-color:#c0fad4eb;">
                                    <tr>
                                        <th>Sl No:</th>
                                        <th>Invoice no</th>
                                        <th>Category</th>
                                        <th>Product Name</th>
                                        <th>Current Stock</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total Price</th>

                                    </tr>
                                </thead>
                                <tbody style="background-color:#c0fad4eb;">
                                    @php
                                    $total=0;
                                    @endphp
                                    @foreach ($invoice['invoice_detail'] as $key=>$data )
                                    <tr>
                                        <input type="hidden" name="id" value="{{$invoice->id}}">
                                        <input type="hidden" name="category_id[]" value="{{$data->category_id}}">
                                        <input type="hidden" name="product_id[]" value="{{$data->product_id}}">

                                        <input type="hidden" name="selling_qty[{{$data->id}}]"
                                            value="{{$data->selling_qty}}">

                                        <td>{{$key+1}}</td>
                                        <td>{{$invoice_no}}</td>
                                        <td>{{$data['category']['name']}}</td>
                                        <td>{{$data['product']['name']}}</td>
                                        <td>{{$data['product']['quantity']}}</td>
                                        <td>{{$data['selling_qty']}}</td>
                                        <td>{{$data['unit_price']}}</td>
                                        <td>{{$data['selling_price']}}</td>
                                    </tr>
                                    @php
                                    $total+=$data['selling_qty']*$data['unit_price'];
                                    @endphp
                                    @endforeach
                                    <hr>

                                    <tr>
                                        <td colspan="7">
                                            Total Amount
                                        </td>
                                        <td>{{$total}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            Paid Amount
                                        </td>
                                        <td>{{$payment->paid_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            Due Amoount
                                        </td>
                                        <td>{{$payment->due_amount}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>

                            <button type="submit" class="btn btn-info">Invoice Approve</button>
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>

</div>

@endsection