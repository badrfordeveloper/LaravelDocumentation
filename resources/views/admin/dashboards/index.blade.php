<x-app-layout>

    @section('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        .calendar-icon {
            margin: 5px;
            font-size: 16px;
            display: inline-block;
        }
    </style>
    @endsection

    <div class="content-body">
        <!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
      im good
        </section>
        <!-- Dashboard Ecommerce ends -->

    </div>
    @section('script')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js')}}"></script>





        <script>
          $(function() {
            let searchParams = new URLSearchParams(window.location.search)
            let start = ( searchParams.get('startDate')  ?  searchParams.get('startDate') : moment().subtract(7, "days") );
            let end = ( searchParams.get('endDate')  ?  searchParams.get('endDate') : moment() );
            function cb(start,end) {
                $('#reportrange span').html(moment(start).format('DD-MM-YYYY') + ' | ' + moment(end).format('DD-MM-YYYY'));
            }
            $('#reportrange').daterangepicker({
                locale: {
                    "customRangeLabel": "Date personnalisée",
                },
                opens: 'center',
                start: start,
                end: end,
                ranges: {
                   'Aujourd\'hui': [moment(), moment()],
                   'Hier': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                   'Les 3 derniers jours': [moment().subtract(2, 'days'), moment()],
                   'Les 7 derniers jours': [moment().subtract(6, 'days'), moment()],
                   'Les 14 derniers jours': [moment().subtract(13, 'days'), moment()],
                   'Les 30 derniers jours': [moment().subtract(29, 'days'), moment()],
                   'Ce mois ': [moment().startOf('month'), moment()],
                   'Le mois dernier': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                   'Trois mois': [moment().subtract(89, 'days'), moment()],
                   'Un an': [moment().subtract(364, 'days'), moment()]
                }
            }, cb);
            console.log(start)
            cb(start,end);

            $('#reportrange').on('apply.daterangepicker', (e, picker) => {

                $('#startDate').val(picker.startDate.format('YYYY-MM-DD'))
                $('#endDate').val(picker.endDate.format('YYYY-MM-DD'))
                $('#buttonSubmit').click();


               /*  let searchParams = new URLSearchParams(window.location.search);
                searchParams.set('startDate', picker.startDate.format('DD-MM-YYYY') );
                searchParams.set('endDate', picker.endDate.format('DD-MM-YYYY') );
                window.search = searchParams;
                window.location = window.location.href.split('?')[0]+ '?' + window.search ; */
            });
        });
        </script>
    @endsection
</x-app-layout>
