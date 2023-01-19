@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="box-shadow: 4px 3px #18814b, -6px 0 0.4em #0080145e">

                        <h4 class="card-title">Add new Customer </h4><br><br>


                        @if(count($errors))
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                        @endforeach

                        @endif


                        <form method="post" action="{{ route('customer.wise.report') }}" id="myForm" target="_blank">
                            @csrf


                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Customer Name</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="customer_id"
                                        required>
                                        <!-- <option selected="">Open this select menu</option> -->
                                        @foreach($alldata as $customer)
                                        <option value="{{$customer->id}}">{{$customer->name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Search">
                        </form>



                    </div>
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>
<!-- <script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
            },
            messages :{
                name: {
                    required : 'Please Enter Blog Category',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script> -->

@endsection