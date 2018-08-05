<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ThemeBucket">
        <link rel="shortcut icon" href="http://bucketadmin.themebucket.net/images/favicon.png">

        <title>Main Page</title>

        <!--Core CSS -->
        <link href="{{asset('bs3/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/bootstrap-reset.css')}}" rel="stylesheet">
        <!--        <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet" />-->
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/font-awesome.min.css')}}">

        <link href="{{asset('js/advanced-datatable/css/demo_page.css')}}" rel="stylesheet" />
        <link href="{{asset('js/advanced-datatable/css/demo_table.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('js/data-tables/DT_bootstrap.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('js/select2/select2.css')}}" />

        <link rel="stylesheet" type="text/css" href="{{asset('js/bootstrap-fileupload/bootstrap-fileupload.css')}}" />



        <!-- Custom styles for this template -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">     
        <link href="{{asset('css/style-responsive.css')}}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>
        <style type="text/css">
            .holder{
             color: red;   
            }
            
            textarea { resize: none;}
        </style>
    </head>

    <body>

        <section id="container" >
            <!--header start-->
            <!--header end-->
            @include('layouts.header')

            @include('layouts.nav')

            <!--sidebar end-->
            <!--main content start-->
            <section id="main-content">
                @yield('content')

            </section>
            <!--main content end-->

        </section>
        <div class="modal" id="loaderModal" data-keyboard="false" data-backdrop="static" role="dialog" >
            <div class="modal-dialog" role="document">


                <div  id="loader" style="margin-top:30% ">
                    <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
                    <span class="loader-text">Wait...</span>
                </div>


            </div>

        </div>
        <div class="modal " id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="deleteForm">
                        <div class="modal-body">
                            <div>
                                <p>
                                    Are you sure you want to delete?.<span class="holder" id="holdername"></span> 
                                </p>
                            </div>
                            <input type="hidden" class="form-control form-control-lg input-lg" id="token" name="_token" value="<?php echo csrf_token() ?>" />

                            <input type="hidden" id="code" name="code"/>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                            <button type="submit"  class="btn btn-primary">YES</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('layouts.footer')

        @yield('customjs')

    </body>
</html>
