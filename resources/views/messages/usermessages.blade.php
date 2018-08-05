@extends('layouts.master')

@section('content')



<?php
$messages = json_decode($messages, true);
$userData = $messages['details']["userInfo"];
$msg = $messages['details']['messages'];
?>
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-sm-4">
            <section class="panel">
                <div class="panel-body">
                    <a href="#reply" role="button"  data-toggle="modal"
                       class="btn btn-compose">
                        Reply 
                    </a>

                    <ul class="nav nav-pills nav-stacked mail-nav">
                        <li><a href="#"> <i class="fa fa-user"></i> Name <span class="pull-right"> {{$userData['fullname']}}</span></a></li>
                        <li><a href="#"> <i class="fa fa-phone"></i> Contact <span class="pull-right">{{$userData['contact']}} </span></a></li>
                        <li><a href="#"> <i class="fa fa-envelope"></i> Email <span class="pull-right">{{$userData['email']}} </span></a></li>
                        <li><a href="#"> <i class="fa fa-clock-o"></i> Date Created <span class="pull-right">{{$userData['datecreated']}} </span></a></li>

                    </ul>
                </div>
            </section>


        </div>


        <div class="col-sm-8">
            <section class="panel">

                <div class="panel-body ">
                    <p>{{$userData['fullname']}} Messages</p>
                    <?php
                    foreach ($msg as $value) {
                        ?>
                        <div class="mail-sender">
                            <div class="row">
                                <div class="col-md-8">

                                    <strong>
                                        <?php
                                        if ($value['system_id'] == null) {
                                            echo $value['fullname'];
                                        } else {
                                            echo $value['system_user'];
                                        }
                                        ?>

                                    </strong>

                                </div>
                                <div class="col-md-4">
                                    <p class="date"> {{$value['datesent']}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="view-mail ">
                            {{$value['message']}}
                        </div>
                        <br>


                        <?php
                    }
                    ?>


                </div>
            </section>
        </div>
    </div>


    <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Reply</h4>
                </div>
                <br>
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
                <div class="modal-body row">

                    <form id="replyMessage">
<!--                        {{ Session::get('name')}}-->
                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />
                        <input type="hidden" class="form-control form-control-lg input-lg" name="userid" value="{{$userData['id']}}" />
                        <input type="hidden" class="form-control form-control-lg input-lg" name="systemid" value="1" />

                        <div class="col-md-12">

                            <div class="form-group">
                                <label> Message</label>
                                <textarea rows="12" name="message"  class="form-control" required ></textarea>
                            </div>

                            <div class="pull-right">
                                <input class="btn btn-primary" type="submit" value="Submit"/>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- page end-->
</section>
@endsection

@section('customjs')

<script type="text/javascript">

    $('#replyMessage').on('submit', function (e) {
        e.preventDefault();
        $('input:submit').attr("disabled", true);
        var formData = $(this).serialize();
        console.log(formData);
      //  $('#reply').modal('hide');
        $('#loaderModal').modal('show');

        $.ajax({
            url: "{{url('messages/reply')}}",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (data) {
                console.log(data);
                // $("#loader").hide();
                $('input:submit').attr("disabled", false);
                $('#loaderModal').modal('hide');


                if (data.success == 0) {
                    document.getElementById("replyMessage").reset();
                    $('#successmsg').html(data.message);
                    $('#successdiv').show();
                    $('#errordiv').hide();
                    getCategories();
                } else {
                    $('#errormsg').html(data.message);
                    $('#errordiv').show();
                    $('#successdiv').hide();
                }
            },
            error: function (jXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });

    });

</script>
@endsection