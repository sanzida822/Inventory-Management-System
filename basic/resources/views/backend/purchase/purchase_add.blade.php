@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="box-shadow: 4px 3px #18814b, -6px 0 0.4em #0080145e">

                        <h4 class="card-title">Add Purchase </h4><br><br>
                        <div class="row">
                            <div class="col-md-4">

                                <label for="example-text-input" class="col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="date" name="date" type="date" value="{{$date}}">
                                </div>

                            </div>

                            <div class="col-md-4">

                                <label for="example-text-input" class="col-form-label">Purchase No</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="purchase_no" type="text" value=""
                                        id="purchase_no">
                                </div>

                            </div>

                            <div class="col-md-4">

                                <label for="example-text-input" class="col-form-label">Supplier Name</label>
                                <select class="form-select" aria-label="Default select example" id="supplier_id"
                                    name="supplier_id" required>
                                    <option selected="">Open this select menu</option>
                                    @foreach($supplier as $suppl)
                                    <option value="{{$suppl->id}}">{{$suppl->name}}</option>
                                    @endforeach

                                </select>

                            </div>


                            <div class="col-md-4">

                                <label for="example-text-input" class="col-form-label">Category Name</label>
                                <select class="form-select" aria-label="Default select example" id="category_id"
                                    name="category_id" required>
                                    <option selected="">Open this select menu</option>
                                    <!-- @foreach($category as $suppl)
                                    <option value="{{$suppl->id}}">{{$suppl->name}}</option>
                                    @endforeach -->
                                </select>
                            </div>

                            <div class="col-md-4">

                                <label for="example-text-input" class="col-form-label">Product Name</label>
                                <select class="form-select" aria-label="Default select example" id="product_id"
                                    name="product_id" required>
                                    <option selected="">Open this select menu</option>

                                </select>

                            </div>

                            <div class="col-md-4" class="">
                                <label for="example-text-input" class="col-form-label" style="margin-top:45px"></label>

                                <!-- <input type="submit" id="add_more" name="add_more" class="btn btn-secondary btn-rounded waves-effect waves-light" value="Add more"> -->
                                <!-- <input type="submit" class="btn btn-secondary btn-rounded  ri-file-add-fill addeventmore" name="" id="" value="Add more"> -->
                                <button class="btn btn-success btn-rounded  fas fa-plus-circl addeventmore" value="">Add
                                    more</button>
                                <!-- circle for + icon -->
                                <!-- <i class=" " id=""> Add more</i> -->


                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('storepurchasedata')}}" method="post">
                            @csrf
                            <table class="table  table-sm" width='100%' style="border-color: #ddd;">
                                <thead>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Unit</th>
                                    <th>Unit Price</th>
                                    <th>Description</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </thead>

                                <tbody id="addRow" class="addRow">

                                </tbody>
                                <tbody>
                                    <tr>
                                        <td colspan="5">

                                        </td>
                                        <td>
                                            <input type="text" name="calculate_amount" value="0" id="calculate_amount"
                                                class="form-control" readonly style="background-color: #ddd;">
                                        </td>

                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <div class="form-group">
                                <button type="submit" class=" btn btn-info" id="addpurchase">Store Purchase</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>

    <script type="">
        $(document).ready(function() {
            $(".addeventmore").click(function() {

                var date = $('#date').val();
                var purchase_no = $('#purchase_no').val();
                var supplier_id = $('#supplier_id').val();
                var category_id = $('#category_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#product_id').val();
                var product_name = $('#product_id').find('option:selected').text();
                // alert(product_name);

                if (date == '') {
                    $.notify('Date is Required', {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                if (purchase_no == '') {
                    $.notify('Purchase No is Required', {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                if (supplier_id == '') {
                    $.notify('Supplier  is Required', {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                if (category_id == '') {
                    $.notify('Category  is Required', {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                if (product_id == '') {
                    $.notify('Product field  is Required', {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

                var source = $("#document-template").html();
                // alert(source)
                var template = Handlebars.compile(source);
              
                //    alert(template);
                var data = {
                    date:date,
                    purchase_no:purchase_no,
                    supplier_id:supplier_id,
                    category_id : category_id,
                    category_name: category_name,
                    product_id: product_id,
                    product_name: product_name,

                };


                var html = template(data);  //first compile in  handlebar then pass value
                $('#addRow').append(html);

            });

        });
    </script>


    <!-- delte row when click cross button -->
    <script>
    $(document).on("click", ".deleterow", function(e) {
        $(this).closest('.delete_add_more_item').remove();
        totalAmount();
    })
    </script>


    <!-- calculate total price -->
    <script>
    $(document).on("keyup click", ".unit_price,.buying_qty", function(e) {
        //  var price =$(".unit_price").val();
        var price = $(this).closest("tr").find("input.unit_price").val();
        //  var qty =$(".buying-qty").val();
        var qty = $(this).closest("tr").find("input.buying_qty").val();
        var totalPrice = price * qty;
        $(this).closest("tr").find("input.buying_price").val(totalPrice);


        //    alert(totalPrice)

        totalAmount();
    })
    </script>

    <!-- calculate total amount of invoice -->

    <script>
    function totalAmount() {
        var sum = 0;
        $('.buying_price').each(function(e) {
                var value = $(this).val();
                if (!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);

                }
                //  alert(sum);

            }

        );
        $('#calculate_amount').val(sum);

    }
    </script>

    <script id="document-template" type="text/x-handlebars-template">

        <tr class="delete_add_more_item" id="delete_add_more_item">
            <input type="hidden" type="" name="date[]"  value="@{{date}}">
            <input type="hidden" type="" name="purchase_no[]"  value="@{{purchase_no}}">
            <input type="hidden" type="" name="supplier_id[]"  value="@{{supplier_id}}">
   
        <td>
        <input type="hidden" type="" name="category_id[]"  value="@{{category_id}}">
        @{{category_name}}
        </td>
        
        <td>
        <input type="hidden" type="" name="product_id[]"  value="@{{product_id}}">
        @{{product_name}}
        </td>

        <td>
        <input type="number" min="1" class="form-control buying_qty text-right" name="buying_qty[]" value="" required >
        </td>

        <td>
        <input type="number"  class="form-control unit_price text-right" name="unit_price[]" value="" required >
        </td>

        <td>
        <input type="text"  class="form-control description " name="description[]"    >
        </td>


        <td>
        <input type="number" min="1" class="form-control buying_price text-right" name="buying_price[]" value="0" readonly  >
        </td>

        <td>
            <i class="btn btn-danger btn-sm fas fa-window-close deleterow"></i>
        </td>
   
   
        </tr>

       
</script>





    <script type="">
        $(function(){
        $(document).on('change','#supplier_id',function(){
            var supplier_id=$(this).val();
            var html="";
            $.ajax({
                url:"{{route('getCategory')}}",  //the targeted resources
                type:"GET",                     //the type of http request
                data:{supplier_id:supplier_id},      // we pass our var
                success:function(data){         
                     html='<option value="">Select category</option>'
                    $.each(data,function(key,v){
                        html+= '<option value="'+v.category_id+'">'+v.category.name+'</option>'  ;
                        $('#category_id').html(html);
                    });
                
                   
                     
                }
           

            })
        })  
    });



    </script>


    <script type="text/javascript">
    $(function() {
        $(document).on('change', '#category_id', function() {
            var category_id = $(this).val();
            var supplier_id = $('#supplier_id').val();

            var html = "";
            $.ajax({
                url: "{{route('getSupplierProduct')}}", //the targeted resources
                type: "GET", //the type of http request
                data: {
                    category_id: category_id,
                    supplier_id: supplier_id,
                }, // we pass our var
                success: function(data) {
                    html = '<option value="">Select Product</option>'
                    $.each(data, function(key, v) {
                        html += '<option value="' + v.id + '">' + v.name +
                            '</option>';
                        $('#product_id').html(html);
                    });

                }
            })
        })
    });
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