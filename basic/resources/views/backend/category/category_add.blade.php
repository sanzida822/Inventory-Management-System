@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body"  style="box-shadow: 4px 3px #18814b, -6px 0 0.4em #0080145e">

                        <h4 class="card-title">Add new Category </h4><br><br>


                        @if(count($errors))
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                        @endforeach

                        @endif


                        <form method="post" action="{{route('category.store') }}" id="myForm">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" type="text" required id="oldpassword">
                                </div>
                            </div>
                            <!-- end row -->






                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Category">
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