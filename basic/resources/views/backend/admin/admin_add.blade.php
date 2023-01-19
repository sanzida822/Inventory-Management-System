@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="box-shadow: 4px 3px #18814b, -6px 0 0.4em #0080145e">

                        <h4 class="card-title">Add new Admin </h4><br><br>


                        @if(count($errors))
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                        @endforeach

                        @endif

                        <p id="checkPasssLen" style="color:red;font-weight:600">
                        </p>
                        <form method="post" action="{{route('admin.store') }}" id="myForm">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Admin Name</label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" type="text" required id="Name">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Admin Email</label>
                                <div class="form-group col-sm-10">
                                    <input name="email" class="form-control" type="email" required id="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Admin Password</label>
                                <div class="form-group col-sm-10">
                                    <input name="password" class="form-control" type="text" required id="password">
                                </div>
                            </div>
                            <!-- end row -->






                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Admin">
                        </form>



                    </div>
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>
<script>
$(document).ready(function() {
    $(document).on('keyup', '#password', function() {
        var new_pass = $(this).val();
        var html = "";

        $.ajax({
            url: "{{route('checkPassLen')}}",
            type: "GET",
            data: {
                new_pass: new_pass
            },
            success: function(data) {

                $("#checkPasssLen").html(data);
            }
        })
    })
})
</script>
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