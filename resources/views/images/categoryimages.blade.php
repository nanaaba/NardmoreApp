@extends('layouts.master')

@section('content')


<section class="wrapper">
    <!-- page start-->

    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                     Images

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
                    
                    
                    
                    
                    <div class="row">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-white btn-sm"><i class="fa fa-upload"></i>
                                <a href="{{ url('images/upload') }}" data-toggle="modal">  Upload New Image
                                </a>
                            </button>
                        </div>
                    </div>
                    <br>

                    <?php
                    if (sizeof($images) > 0) {
                        echo ' <div id="gallery" class="media-gal">';
                        foreach ($images as $img) {
                            ?>
                            <div class="images item " >
                                <a href="#" onclick="getImageInfo({{$img['id']}})">
                                    <img src="{{$img['url']}}" alt="" />
                                </a>
                                <p>{{$img['name']}}</p>
                            </div>
                            <?php
                        }
                        echo '</div>';
                    } else {
                        ?>
                        <div class="alert alert-block alert-info fade in" >

                            <strong>Sorry!</strong> <span >No images uploaded yet under this category</span>
                        </div>
                        <?php
                    }
                    ?>

                    <!--                    <div id="gallery" class="media-gal">
                                            <div class="images item " >
                                                <a href="gallery.html#myModal" data-toggle="modal">
                                                    <img src="{{asset('images/gallery/image1.jpg')}}" alt="" />
                                                </a>
                                                <p>img01.jpg </p>
                                            </div>
                    
                    
                                        </div>-->


                    <!-- Modal -->
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Edit Image</h4>
                                </div>

                                <div class="modal-body row">
                                    <form id="updateImage" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                                        <div class="col-md-5 img-modal">
                                            <div class="form-group ">
                                                <label class="control-label ">Image </label>
                                                <div>
                                                    <input type="hidden" name="public_id" id="public_id" class="default" />
                                                    <input type="hidden" name="picid" id="picid" class="default" />

                                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="" alt=""  id="imageUrl" />
                                                        </div>
                                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                        <div>
                                                            <span class="btn btn-white btn-file">
                                                                <span class="fileupload-new"><i class="fa fa-pencil"></i> Edit image</span>
                                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                                <input type="file" name="image" class="default" />
                                                            </span>
                                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <p class="mtop10">

                                            <p><strong>File Type:</strong> <span id="filetype"></span></p>
                                            <p><strong>Date Created:</strong> <span id="datecreated"></span></p>
                                            <p><strong>Uploaded By:</strong> <span id="uploadedby"></span></p>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label> Name</label>
                                                <input id="imgname" name="imagename" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label> Description</label>
                                                <textarea rows="2" name="description" id="description" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label >Category</label>
                                                <select name="category" id="categories" class="populate select2"  style="width:100%" >
                                                    <option value="">Choose ...</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label >Pic Of Day</label>
                                                <select class="populate select2" id="picofday" name="picofday"  style="width:100%">
                                                    <option value="">Choose ...</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label >Payment Status</label>
                                                <select class="populate select2" id="paymentStatus" name="paymentStatus"  style="width:100%" >
                                                    <option value="">Choose ...</option>
                                                    <option value="0">Free</option>
                                                    <option value="1">Paid</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label >Currency</label>
                                                <select class="populate select2" name="currency" id="currency"  style="width:100%" required>
                                                    <option value="">Choose ...</option>
                                                    <option value="GHS">GHS</option>
                                                    <option value="USDs">USD</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label> Price</label>
                                                <input id="price" name="price"  class="form-control">
                                            </div>


                                            <div class="pull-right">
                                                <button class="btn btn-danger" type="button" onclick="deletePicture()">Delete</button>
                                                <button class="btn btn-primary" type="submit">Save changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- modal -->



                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>
@endsection

@section('customjs')
<script type="text/javascript">


    function getImageInfo(id) {

    $.ajax({
    url: "../" + id,
            type: "GET",
            dataType: "json",
            success: function (data) {

            if (data.success == 0) {
            var details = data.details;
            console.log(data);
            //imageUrl
            $('#public_id').val(details.public_id);
            $('#picid').val(details.id);
            $("#imageUrl").attr("src", details.url);
            $("#filetype").html(details.format);
            $("#datecreated").html(details.datecreated);
            $("#uploadedby").html(details.addedby);
            $("#imgname").val(details.name);
            $("#description").val(details.description);
            $('#paymentStatus').val(details.payment_status).trigger('change');
            $("#price").val(details.price);
            $("#currency").val(details.currency).trigger('change');
            $("#categories").val(details.cat_id).trigger('change');
            $("#picofday").val(details.picofday).trigger('change');
            $('#updateModal').modal('show');
            }

            },
            error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
            }


    }
    );
    }

    function deletePicture() {
    var publicid = $('#public_id').val();
    var imgname = $('#imgname').val();
    // alert('deletepic' + publicid + ' ' + imgname);
    $('#code').val(publicid);
    $('#holdername').html(imgname);
    $('#updateModal').modal('hide');
    $('#confirmModal').modal('show');
    }


    $('#deleteForm').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    var code = $('#code').val();
    var token = $('#token').val();
    $('#confirmModal').modal('hide');
    $('#loaderModal').modal('show');
    $.ajax({
    url: '../' + code,
            type: "DELETE",
            data: {_token: token},
            dataType: "json",
            success: function (data) {
            console.log(data);
            // $("#loader").hide();
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
            document.getElementById("deleteForm").reset();
            if (data.success == 0) {
            $('#successmsg').html(data.message);
            $('#successdiv').show();
            $('#errordiv').hide();
            } else {
            $('#errormsg').html(data.message);
            $('#errordiv').show();
            $('#successdiv').hide();
            }
            },
            error: function (jXHR, textStatus, errorThrown) {
            $('#loaderModal').modal('hide');
            alert(errorThrown);
            }
    });
    });
    $('#updateImage').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    // var formData = $(this).serialize();
    var formData = new FormData($('#updateImage')[0]);
    console.log(formData);
    //alert('jjj');
    $('#loaderModal').modal('show');
    $.ajax({
    url: "{{url('images/update')}}",
            type: "POST",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (data) {
            console.log(data);
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
            $('#updateModal').modal('hide');
            if (data.success == 0) {
            $('#successmsg').html(data.message);
            $('#successdiv').show();
            $('#errordiv').hide();
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
