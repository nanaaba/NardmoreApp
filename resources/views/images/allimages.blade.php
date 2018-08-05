@extends('layouts.master')

@section('content')


<section class="wrapper">
    <!-- page start-->

    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    IMAGES CATEGORIES

                </header>
                <div class="panel-body">



                    <?php
                    if (sizeof($categories) > 0) {
                        echo ' <div id="gallery" class="media-gal">';
                        foreach ($categories as $cat) {
                            ?>


                            <div class="images item ">
                                <a href="category/{{$cat['id']}}">
        <!--                                    <img src="{{asset('images/gallery/image1.jpg')}}" alt="" />-->
                                    <p>{{$cat['name']}}</p>
                                </a>

                            </div>
                            <?php
                        }
                        echo '</div>';
                    }
                    ?>





                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>
@endsection