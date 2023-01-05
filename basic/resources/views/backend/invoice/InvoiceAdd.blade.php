@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Invoice </h4><br><br>
                        <div class="row">
                            <div class="col-md-1">

                                <label for="example-text-input" class="col-form-label">Invoice</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="invoice_no" type="text" value="{{$invoice_no}}" id="invoice_no" style="background-color: #ddd;" readonly>
                                </div>

                            </div>
                            <div class="col-md-3">

                                <label for="example-text-input" class="col-form-label">Date</label>
                                <div class="col-sm-10">
                                    <input class="form-control" id="date" name="date" type="date" value="{{$date}}">
                                </div>

                            </div>

                            <div class="col-md-3">

                                <label for="example-text-input" class="col-form-label">Category Name</label>
                                <select class="form-select select2" aria-label="Default select example" id="category_id" name="category_id" required>
                                    <option selected="">Open this select menu</option>
                                    @foreach($category as $catData)
                                    <option value="{{$catData->id}}">{{$catData->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">

                                <label for="example-text-input" class="col-form-label">Product Name</label>
                                <select class="form-select select2" aria-label="Default select example" id="productid" name="product_id" required>
                                    <option selected="">Open this select menu</option>

                                </select>

                            </div>

                            <div class="col-md-1">

                                <label for="example-text-input" class="col-form-label">Stock</label>
                                <div class="col-sm-10">
                                    <input class="form-control stock-quantity" name="stock" type="text" value="" id="stock" style="background-color: #ddd;" readonly>
                                </div>

                            </div>





                            <div class="col-md-4" class="">
                                <label for="example-text-input" class="col-form-label" style="margin-top:45px"></label>

                                <!-- <input type="submit" id="add_more" name="add_more" class="btn btn-secondary btn-rounded waves-effect waves-light" value="Add more"> -->
                                <!-- <input type="submit" class="btn btn-secondary btn-rounded  ri-file-add-fill addeventmore" name="" id="" value="Add more"> -->
                                <button class="btn btn-warning btn-rounded  fas fa-plus-circle addeventmore" value="" style="color:#fff ;"> Add more</button>
                                <!-- <i class=" " id=""> Add more</i> -->


                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{route('storeinvoicedata')}}" method="post">
                            @csrf
                            <table class="table table-sm" width='100%' style="border-color: #ddd;">
                                <thead>
                                    <th>Category</th>
                                    <th>Product Name</th>
                                    <th>Unit</th>
                                    <th>Unit Price</th>

                                    <th>Total Price</th>
                                    <th>Action</th>
                                </thead>

                                <tbody id="addRow" class="addRow">

                                </tbody>
                                <tbody>
                                    <tr>
                                        <td colspan="4">
                                            Total Amount
                                        </td>
                                        <td>
                                            <input type="text" name="calculate_amount" value="0" id="calculate_amount" class="form-control" readonly style="background-color: #ddd;">
                                        </td>

                                        <td>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="description" id="descrition" placeholder="You can write description"></textarea>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="">Paid Status</label>
                                    <select name="payment_status" id="payment_status" class="payment_status form-select select2">
                                        <option value="">Select Status</option>
                                        <option value="Full_Paid">Full Paid</option>
                                        <option value="Partial_Paid">Partial Paid</option>
                                        <option value="Full_Due">Full Due</option>
                                    </select>

                                </div>
                                <br>

                                <div class="form-group col-md-9">
                                    <label for="">Customer</label>
                                    <select name="customer_id" id="customer_id" class="customer_id form-select select2">

                                        <option value="">Select Customer</option>
                                        @foreach($customer as $key=>$item)
                                        <option value="{{$item->id}}">{{$item->name}}-{{$item->mobile_number}}</option>
                                        @endforeach
                                        <option value="0">New Customer</option> 
                                    </select>
                                 

                                </div>

                                <br>
                           
                            </div>
                            <br>
                            <div class="col-md-3 ">
                                    <input type="text" name="partial_amount" class="form-control partial_amount" value="0" placeholder="Enter paid amount" style="display:none">

                                </div>
                            <!-- customer form -->
                            <div class="row form-group" id="customer_form" style="display:none">
                                <div class="col-md-3">

                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">

                                        <input type="text" name="customer_name" class="form-control" placeholder="Enter name">

                                        </div>
                                        <div class="col-md-4">
                                        <input type="email" name="customer_email" class="form-control" placeholder="Enter Email">

                                        </div>
                                        <div class="col-md-4">
                                        <input type="number" name="customer_mobile" class="form-control" placeholder="Enter mobile number">

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class=" btn btn-info" id="addpurchase">Store Invoice</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- end col -->
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
<script>
      $(document).ready(function() {
        $(document).on('change', '#customer_id', function(e) {

        var customer_id = $(this).val();
 
        if (customer_id == "0") {
            $('#customer_form').show();
        } else {
            $('#customer_form').hide();
        }
    });
      })


</script>

<script type="">
    $(document).ready(function() {
            $(".addeventmore").click(function() {

                var date = $('#date').val();
                var invoice_no = $('#invoice_no').val();
          
                // var supplier_id = $('#supplier_id').val();
                var category_id = $('#category_id').val();
                var category_name = $('#category_id').find('option:selected').text();
                var product_id = $('#productid').val();
                var product_name = $('#productid').find('option:selected').text();
    

                if (date == '') {
                    $.notify('Date is Required', {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }

        

                // if (supplier_id == '') {
                //     $.notify('Supplier  is Required', {
                //         globalPosition: 'top right',
                //         className: 'error'
                //     });
                //     return false;
                // }

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
                     invoice_no:invoice_no,
             
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
    $(document).on("keyup click", ".unit_price,.selling_qty", function(e) {
        //  var price =$(".unit_price").val();
        var price = $(this).closest("tr").find("input.unit_price").val();
        //  var qty =$(".buying-qty").val();
        var qty = $(this).closest("tr").find("input.selling_qty").val();
        var totalPrice = price * qty;
        $(this).closest("tr").find("input.selling_price").val(totalPrice);


        //    alert(totalPrice)

        totalAmount();
    })
</script>

<!-- calculate total amount of invoice -->

<script>
    function totalAmount() {
        var sum = 0;
        $('.selling_price').each(function(e) {
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
            <input type="hidden" type="" name="date"  value="@{{date}}">
            <input type="hidden" type="" name="invoice_no"  value="@{{invoice_no}}">
    
   
        <td>
        <input type="hidden" type="" name="category_id[]"  value="@{{category_id}}">
        @{{category_name}}
        </td>
        
        <td>
        <input type="hidden" type="" name="product_id[]"  value="@{{product_id}}">
        @{{product_name}}
    
        </td>

        <td>
        <input type="number" min="1" class="form-control selling_qty text-right" name="selling_qty[]" value="" required >
        </td>

        <td>
        <input type="number"  class="form-control unit_price text-right" name="unit_price[]" value="" required >
        </td>


        <td>
        <input type="number" min="1" class="form-control selling_price text-right" name="selling_price[]" value="0" readonly  >
        </td>

        <td>
            <i class="btn btn-danger btn-sm fas fa-window-close deleterow"></i>
        </td>
   
   
        </tr>

       
</script>





<!-- <script type="">
        $(function(){
        $(document).on('change','#',function(){
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



    </script> -->


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
                        $('#productid').html(html);
                    });

                }
                
            })
        })
    });
</script>

<!-- load stock -->

<script type="text/javascript">
    $(function() {
        $(document).on('change', '#productid', function() {
            var productid = $(this).val();

            $.ajax({
                url: "{{route('getStock')}}", //the targeted resources
                type: "GET", //the type of http request
                data: {
                    product_id: productid
                }, // we pass our var
                success: function(data) {
                    $('.stock-quantity').val(data);

                }
            })
        })
    });
</script>


@endsection