@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="box-shadow: 4px 3px #18814b, -6px 0 0.4em #0080145e">

                        <h4 class="card-title">Invoice Report </h4><br><br>
                        <form action="{{route('dailyinvoice.pdf')}}" target="_blank" method="get">
                            <div class="row">

                                <div class="col-md-6">

                                    <label for="example-text-input" class="col-form-label">Start Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="sdate" name="startdate" type="date"
                                            placeholder="YY-MM-DD">
                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <label for="example-text-input" class="col-form-label">End Date</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="edate" name="enddate" type="date"
                                            placeholder="YY-MM-DD">
                                    </div>



                                </div>

                                <div class="form-group">
                                    <br>
                                    <button type="submit" required class=" btn btn-info"
                                        id="daily_invoice_search">Search</button>
                                </div>




                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>

</div>

<script type="">
    $(document).ready(function() {
            $("#daily_invoice_search").click(function() {

                var sdate = $('#edate').val();
                var edate = $('#edate').val();
           

                if (sdate == '') {
                    $.notify('date is Required', {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
                if (edate == '') {
                    $.notify('date is Required', {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                    return false;
                }
            }) } );
         
               
               
               
               
               </script>
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




<!-- load stock -->



@endsection