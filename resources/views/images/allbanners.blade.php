@extends('layouts.master')

@section('content')


<section class="wrapper">
    <!-- page start-->

    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Banners

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

                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-white btn-sm"><i class="fa fa-upload"></i>
                            <a href="#newBannerModal" data-toggle="modal">  Upload New Banner
                            </a>
                        </button>
                    </div>






                    <?php
                    // print_r($banners);
                    if (sizeof($banners) > 0) {
                        echo ' <div id="gallery" class="media-gal">';
                        foreach ($banners as $item) {
                            ?>
                            <div class="images item " >
                                <a href="#"onclick="getBannerDetail({{$item['id']}})">
                                    <img src="{{$item['url']}}" alt="" />
                                </a>
                                <p>{{$item['name']}}</p>
                            </div>
                            <?php
                        }
                        echo '</div>';
                    }
                    ?>


                    <!-- Modal -->
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Edit Banner</h4>
                                </div>

                                <div class="modal-body row">
                                    <input type="hidden" name="public_id" id="public_id" class="default" required/>

                                    <div class="col-md-5 img-modal">
                                        <div class="form-group ">
                                            <label class="control-label ">Banner </label>
                                            <div>
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="" alt="" id="bannerimg" />
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-pencil"></i> Edit image</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                            <input type="file" name="banner" class="default" required/>
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
                                            <input id="name"  name="bannerName" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label> Description</label>
                                            <textarea rows="2"   name="description" id="description" class="form-control"></textarea>
                                        </div>

                                        <div class="pull-right">
                                            <button class="btn btn-danger" type="button" onclick="deleteBanner()">Delete</button>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="newBannerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">New Bannner</h4>
                                </div>

                                <div class="modal-body row">
                                    <form id="uploadImage" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                                        <div class="col-md-5 img-modal">


                                            <div class="form-group ">
                                                <label class="control-label ">Banner Upload</label>
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
                                                                <input type="file" name="banner" class="default" required/>
                                                            </span>
                                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label> Name</label>
                                                <input name="bannerName" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label> Description</label>
                                                <textarea rows="2" name="description"  class="form-control"></textarea>
                                            </div>

                                            <div class="pull-right">
                                                <button class="btn btn-primary" type="submit">Submit</button>
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

    $('#uploadImage').on('submit', function (e) {
    e.preventDefault();
    $('input:submit').attr("disabled", true);
    // var formData = $(this).serialize();
    var formData = new FormData($('#uploadImage')[0]);
    console.log(formData);
    $('#loaderModal').modal('show');
    $.ajax({
    url: "{{url('images/banner/upload')}}",
            type: "POST",
            data: formData,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function (data) {
            console.log(data);
            $('input:submit').attr("disabled", false);
            $('#loaderModal').modal('hide');
            $('#newBannerModal').modal('hide');
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
    
    
    function getBannerDetail(bannerid){
        
//    $('#bannerimg').attr('src', 'http://res.cloudinary.com/nardmoreimg/image/upload/v1528470221/banners/hesbdlinyvdc8fzpeixd.jpg');
//    $('#updateModal').modal('show');
//   
    
     $.ajax({
           url: "../images/banner/"+bannerid ,
            type: "GET",
            dataType: "json",
            success: function (data) {

            if (data.success == 0) {
            var details = data.details;
            console.log(data);
            //imageUrl
            $('#public_id').val(details.id);
            $("#bannerimg").attr("src", details.url);
            $("#filetype").html(details.format);
            $("#datecreated").html(details.datecreated);
            $("#uploadedby").html(details.addedby);
            $("#name").val(details.name);
            $("#description").val(details.description);
            
            $('#updateModal').modal('show');
            }

            },
            error: function (jXHR, textStatus, errorThrown) {
            alert(errorThrown);
            }


    }
    );
    }



    function deleteBanner() {
    var publicid = $('#public_id').val();
    var imgname = $('#name').val();
   alert('deletepic' + publicid + ' ' + imgname);
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
          url: '../images/banner/' + code,
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

</script>
@endsection