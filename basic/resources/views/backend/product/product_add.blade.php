@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body"  style="box-shadow: 4px 3px #18814b, -6px 0 0.4em #0080145e">

                        <h4 class="card-title">Add new Product </h4><br><br>


                        @if(count($errors))
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                        @endforeach

                        @endif


                        <form method="post" action="{{ route('product.store') }}" id="myForm">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" type="text" required id="oldpassword">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Supplier Name</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="supplier_id"
                                        required>
                                        <!-- <option selected="">Open this select menu</option> -->
                                        @foreach($supplier as $suppl)
                                        <option value="{{$suppl->id}}">{{$suppl->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Unit Name</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="unit_id"
                                        required>
                                        <!-- <option selected="">Open this select menu</option> -->
                                        @foreach($unit as $unitdata)
                                        <option value="{{$unitdata->id}}">{{$unitdata->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="category_id"
                                        required>
                                        <!-- <option>Open this select menu</option> -->
                                        @foreach($category as $categorydata)
                                        <option value="{{$categorydata->id}}">{{$categorydata->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <!-- end row -->



                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Product">
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