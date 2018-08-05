@extends('layouts.master')

@section('content')


<section class="wrapper">
    <!-- page start-->
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Image Upload
                </header>
                <div class="panel-body">

                    <div class="alert alert-success fade in" id="successdiv" style="display: none">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>Success!</strong> <span id="successmsg"></span>
                    </div>
                    <div class="alert alert-block alert-danger fade in" id="errordiv" style="display: none">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>Error!</strong> <span id="errormsg"></span>
                    </div>
                    <form id="uploadImage" enctype="multipart/form-data">
                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label >Category</label>
                                    <select name="category" id="categories" class="populate select2"  style="width:100%" required>
                                        <option value="" disabled>Choose ...</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="imgName" class="form-control" required >
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea rows="8" name="description" style="width: 100%;    resize: none;"></textarea>
                                </div>
<div class="form-group">
                                    <label >Payment Status</label>
                                    <select class="populate select2" name="paymentStatus"  style="width:100%" required>
                                        <option value="">Choose ...</option>
                                        <option value="0">Free</option>
                                        <option value="1">Paid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                 <div class="form-group">
                                    <label >Currency</label>
                                    <select class="populate select2" name="currency"  style="width:100%" required>
                                        <option value="">Choose ...</option>
                                        <option value="GHS">GHS</option>
                                        <option value="USDs">USD</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price" class="form-control" required >
                                </div>
                                <div class="form-group">
                                    <label >Pic Of Day</label>
                                    <select class="populate select2" name="picofday"  style="width:100%">
                                        <option value="">Choose ...</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

                                <div class="form-group ">
                                    <label class="control-label ">Image Upload</label>
                                    <div>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" alt="" />
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                    <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                    <input type="file" name="image" class="default" required/>
                                                </span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <br><br><br>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6 pull-right">
                                <input type="submit" class="btn btn-info  btn-block " value="Submit"/>

                            </div>

                        </div>

                    </form>


                </div>
            </section>



        </div>

    </div>


    <!-- page end-->
</section>
@endsection

@section('customjs')

<script type="text/javascript">

    $('#uploadImage').on('submit', function (e) {
        e.preventDefault();
        $('input:submit').attr("disabled", true);
        // var formData = $(this).serialize();
        var formData = new FormData($('#uploadImage')[0]);

        console.log(formData);
        $('#loaderModal').modal('show');

        $.ajax({
            url: "{{url('images/upload')}}",
            type: "POST",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                $('input:submit').attr("disabled", false);
                $('#loaderModal').modal('hide');
                $('#newUser').modal('hide');


                if (data.success == 0) {
                    document.getElementById("uploadImage").reset();
                    $('#successmsg').html(data.message);
                    $('#successdiv').show();
                    $('#errordiv').hide();
                    getUsers();
                } else {
                    $('#errormsg').html(data.message);
                    $('#errordiv').show();
                    $('#successdiv').hide();
                }
            },
            error: function (jXHR, textStatus, errorThrown) {
                $('input:submit').attr("disabled", false);

                $('#loaderModal').modal('hide');

                console.log(errorThrown);
            }
        });

    });



</script>
@endsection
