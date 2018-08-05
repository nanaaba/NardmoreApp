@extends('layouts.master')

@section('content')


<section class="wrapper">
    <!-- page start-->
    <div class="row">

        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading wht-bg">
                    <h4 class="gen-case">Reservations (34)
                        <form action="#" class="pull-right mail-src-position">
                            <div class="input-append">
                                <input type="text" class="form-control " placeholder="Search Mail">
                            </div>
                        </form>
                    </h4>
                </header>
                <?php
                $reservations = json_decode($reservations, true);
                $msg = $reservations['details'];
                if (sizeof($reservations['details']) > 0) {
                    ?>
                    <div class="panel-body minimal">

                        <div class="table-inbox-wrap ">
                            <table class="table table-inbox table-hover">
                                <thead>
                                    <tr>
                                        <td></td>
                                        <td>User</td>
                                        <td>Contact</td>
                                        <td>Event</td>
                                        <td>Date Requested</td>

                                    </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    foreach ($msg as $single) {
                                        echo ''
                                        . '    <tr class="">
                                        <td class="inbox-small-cells">
                                            <input type="checkbox" class="mail-checkbox">
                                        </td>
                                        <td class="view-message dont-show">' . $single['user_id'] . '</td>
                                        <td class="view-message dont-show">' . $single['contact'] . '</td>
                                     
<td class="view-message"><a href="mail_view.html">' . $single['event'] . '</a></td>
                                        <td class="view-message ">' . $single['datecreated'] . '</td>
                                    </tr>
';
                                    }
                                    ?>



                                </tbody>
                            </table>

                        </div>
                    </div>
                    <?php
                } else {
                    
                }
                ?>

            </section>
        </div>
    </div>

    <!-- page end-->
</section>
@endsection