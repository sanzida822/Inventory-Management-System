@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-content">
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Product Stock Report</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Stock Tables</a></li>
                        <li class="breadcrumb-item active">Product Stock Report</li>
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
                
                


                    <h4 class="card-title">Product Wise Report</h4>
                    <form action="{{route('product.stock.report.print')}}" method="GET">                          

                    <div class="row mb-3"><hr>
                                    
            
        

        <div class="col-md-4">

        <label for="example-text-input" class="col-form-label">Category Name</label>
        <select class="form-select select2" aria-label="Default select example" id="category_id" name="category_id" required>
                <option selected="">Open this select menu</option>
                @foreach($category as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            <br>
        <br>

        </div>
        <div class="col-md-4">

        <label for="example-text-input" class="col-form-label">Product Name</label>
        <select class="form-select select2" aria-label="Default select example" id="product_id" name="product_id" required>
            <option selected="">Open this select menu</option>

        </select>

        </div>
        <div class="col-md-4">
        <button type="submit" style="margin-top: 35px;" class="btn btn-primary" name="productSearch">Search</button>
        </div>

                
            
            </div>
</form>      
        </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
</div> <!-- container-fluid -->
</div>

</div>
<script type="text/javascript">
        $(function() {
            $(document).on('change', '#category_id', function() {
                var category_id = $(this).val();
                var html = "";
                $.ajax({
                    url: "{{route('getProduct')}}", //the targeted resources
                    type: "GET", //the type of http request
                    data: {
                        category_id: category_id
                    }, // we pass our var
                    success: function(data) {
                        html = '<option value="">Select Product</option>'
                        $.each(data, function(key, v) {
                            html += '<option value="' + v.id + '">' + v.name + '</option>';
                            $('#product_id').html(html);
                        });

                    }
                })
            })
        });
    </script>
@endsection 