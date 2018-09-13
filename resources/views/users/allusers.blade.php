@extends('layouts.master')

@section('content')


<section class="wrapper">
    <!-- page start-->
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
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Users
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-cog"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <div class="btn-group">

                        <a href="#newUser" role="button" class="btn btn-primary btn-sm" data-toggle="modal">Add New <i class="fa fa-plus"></i></a>


                    </div>  
                    <br><br>
                    <div class="adv-table table-responsive">
                        <table  class="display table table-bordered table-striped " id="usersTbl">
                            <thead>
                                <tr>
                                    <th>UserName</th>
                                    <th>Contact</th>
                                    <th>Role</th>
                                    <th>Date Created</th>
                                    <th class="hidden-phone">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>


                    <div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">New User</h4>
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

                                    <form id="saveUser">
                                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Username</label>
                                                <input name="username" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label> Contact</label>
                                                <input name="contact" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label> Role</label>

                                                <select name="role"   class="populate select2"  style="width:100%" required>

                                                    <option value="" >Select---</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Normal User">Normal User</option>
                                                </select> 
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
                    <div class="modal fade" id="updateModalUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"> User Information</h4>
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

                                    <form id="updateUser">
                                        <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                                        <input type="hidden" id="code" name="userid"/>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> Username</label>
                                                <input name="username" id="username" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label> Contact</label>
                                                <input name="contact" id="contact" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label> Role</label>

                                                <select name="role" id="roles"  class="populate select2"  style="width:100%" required>

                                                    <option value="" >Select---</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Normal User">Normal User</option>
                                                </select> 
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


                </div>
            </section>
        </div>
    </div>

    <!-- page end-->
</section>
@endsection
@section('customjs')

<script type="text/javascript">
    var datatable = $('#usersTbl').DataTable({
        responsive: true,
        language: {
            paginate:
                    {previous: "&laquo;", next: "&raquo;"},
            search: "_INPUT_",
            searchPlaceholder: "Search…"
        },
        order: [[0, "asc"]]
    });

    getUsers();

    function getUsers()
    {

        $.ajax({
            url: "{{url('users/all')}}",
            type: "GET",
            dataType: "json",
            success: function (data) {
                if (data.success == 1) {

                } else {
                    var dataResult = data.users;
                    console.log(data);
                    datatable.clear().draw();
                    if (dataResult.length == 0) {
                        console.log("NO DATA!");
                    } else {
                        $.each(dataResult, function (key, value) {


                            var j = -1;
                            var r = new Array();
                            // represent columns as array
                            r[++j] = '<td class="subject">' + value.username + '</td>';
                            r[++j] = '<td class="subject">' + value.contact + '</td>';
                            r[++j] = '<td class="subject">' + value.role + '</td>';

                            r[++j] = '<td class="subject">' + value.datecreated + '</td>';
                            r[++j] = '<td><button onclick="editUser(\'' + value.id + '\')"  class="btn btn-info btn-sm editBtn" type="button">Edit</button>\n\
                              <button onclick="deleteType(\'' + value.id + '\',\'' + value.username + '\')"  class="btn btn-danger btn-sm deleteBtn" type="button">Delete</button></td>';
                            rowNode = datatable.row.add(r);
                        });
                        rowNode.draw().node();
                    }

                }
            },

            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }


        }
        );
    }


    $('#saveUser').on('submit', function (e) {
        e.preventDefault();
        $('input:submit').attr("disabled", true);
        var formData = $(this).serialize();
        console.log(formData);
        $('#loaderModal').modal('show');

        $.ajax({
            url: "{{url('user')}}",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('input:submit').attr("disabled", false);
                $('#loaderModal').modal('hide');
                $('#newUser').modal('hide');


                if (data.success == 0) {
                    document.getElementById("saveUser").reset();
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



 $('#updateUser').on('submit', function (e) {
        e.preventDefault();
        $('input:submit').attr("disabled", true);
        var formData = $(this).serialize();
        console.log(formData);
        $('#loaderModal').modal('show');

        $.ajax({
            url: "{{url('user')}}",
            type: "PUT",
            data: formData,
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('input:submit').attr("disabled", false);
                $('#loaderModal').modal('hide');
                $('#updateModalUser').modal('hide');


                if (data.success == 0) {
                    document.getElementById("saveUser").reset();
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


    function deleteType(code, title) {
        console.log(code + title);
        $('#code').val(code);
        $('#holdername').html(title);
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
            url: 'user/' + code,
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
                    getUsers();
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

    function editUser(code) {
        console.log('goood');
        $('#code').val(code);
        $('#loaderModal').modal('show');

        getUserInfo(code);
        $('#loaderModal').modal('hide');

        $('#updateModalUser').modal('show');

    }

    function getUserInfo(id) {


        $.ajax({
            url: 'user/' + id,
            type: "GET",
            dataType: "json",
            success: function (data) {
                var details = data.details;
                console.log(details.username);
                $('#username').val(details.username);
                $('#contact').val(details.contact);
                $('#roles').val(details.role).change();
                
                $('#code').val(id);

            },
            error: function (jXHR, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });

    }
</script>
@endsection
