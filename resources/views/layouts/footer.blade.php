<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('bs3/js/bootstrap.min.js')}}"></script>


<script src="{{asset('js/jquery-migrate.js')}}"></script>

<script class="include" type="text/javascript" src="{{asset('js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.js')}}"></script>



<script src="{{asset('js/jquery.isotope.js')}}"></script>

<!--Easy Pie Chart-->
<script src="{{asset('js/easypiechart/jquery.easypiechart.js')}}"></script>
<!--Sparkline Chart-->
<script src="{{asset('js/sparkline/jquery.sparkline.js')}}"></script>
<!--jQuery Flot Chart
<script src="{{asset('js/flot-chart/jquery.flot.js')}}"></script>
<script src="{{asset('js/flot-chart/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('js/flot-chart/jquery.flot.resize.js')}}"></script>
<script src="{{asset('js/flot-chart/jquery.flot.pie.resize.js')}}"></script>-->
<!--<script type="text/javascript" src="{{asset('js/advanced-datatable/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('js/data-tables/DT_bootstrap.js')}}"></script>-->
<!--
<script src="{{asset('js/dynamic_table_init.js')}}"></script>-->
<script src="{{asset('js/select2/select2.js')}}"></script>
<script src="{{asset('js/select-init.js')}}"></script>
<script type="text/javascript" src="{{asset('js/fuelux/js/spinner.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js" type="text/javascript"></script>


<!--common script init for all pages-->
<script src="{{asset('js/scripts.js')}}"></script>
<script type="text/javascript">
$('.select2').select2();
</script>
<script type="text/javascript">
    $(function () {
        var $container = $('#gallery');
        $container.isotope({
            itemSelector: '.item',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });

        // filter items when filter link is clicked
        $('#filters a').click(function () {
            var selector = $(this).attr('data-filter');
            $container.isotope({filter: selector});
            return false;
        });
    });

    getCategories();
    function getCategories() {


        $.ajax({
            url: "{{url('category/all')}}",
            type: "GET",
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $.each(data.details, function (i, item) {

                    $('#categories').append($('<option>', {
                        value: item.id,
                        text: item.name
                    }));
                });
            }

        });
    }
</script>