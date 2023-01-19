@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Change Password Page </h4><br><br>


                        @if(count($errors))
                        @foreach ($errors->all() as $error)
                        <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                        @endforeach

                        @endif
                        <p id="Oldpassmatch" style="color:red;font-weight:600"> </p>
                        <p id="passlenmatch" style="color:red;font-weight:600"> </p>
                        <p id="passnotmatch" style="color:red;font-weight:600"> </p>
                        <form method="post" action="{{ route('update.password') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input name="oldpassword" class="form-control" type="password" class="oldpassword"
                                        id="oldpassword">
                                </div>
                            </div>
                            <!-- end row -->


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input name="newpassword" class="form-control" type="password" id="newpassword">
                                </div>
                            </div>
                            <!-- end row -->



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input name="confirm_password" class="form-control" type="password"
                                        class="confirm_password" id="confirm_password">
                                </div>
                            </div>
                            <!-- end row -->




                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                        </form>



                    </div>
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>

<script>
$(document).ready(function() {
    $(document).on("keyup", '#oldpassword', function() {
        var oldpass = $(this).val();

        var html = "";
        $.ajax({
            url: "{{route('getOldPass')}}",
            type: "GET",
            data: {
                oldpass: oldpass
            },
            success: function(data) {
                $('#Oldpassmatch').html(data);
            }

        })
    })

})
</script>

<script>
$(document).ready(function() {
    $(document).on('keyup click', '#newpassword', function() {
        // var confirm_pass = $('#confirm_password').val();
        var new_pass = $('#newpassword').val();
        var html = "";
        $.ajax({
            url: "{{route('checkPassLen')}}",
            type: "GET",
            data: {

                new_pass: new_pass
            },
            success: function(data) {
                $('#passlenmatch').html(data);
            }
        })


    })
})
</script>

<script>
$(document).ready(function() {
    $(document).on('keyup click', '#confirm_password', function() {
        var confirm_pass = $('#confirm_password').val();
        var new_pass = $('#newpassword').val();
        var html = "";
        $.ajax({
            url: "{{route('passMatch')}}",
            type: "GET",
            data: {

                new_pass: new_pass,
                confirm_pass: confirm_pass,
            },
            success: function(data) {
                $('#passnotmatch').html(data);
            }
        })


    })
})
</script>

@endsection