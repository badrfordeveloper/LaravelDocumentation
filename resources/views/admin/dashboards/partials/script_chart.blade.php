<script>

$(window).on('load', function () {
  'use strict';

  var $barColor = '#f3f3f3';
  var $trackBgColor = '#EBEBEB';
  var $textMutedColor = '#b9b9c3';
  var $budgetStrokeColor2 = '#dcdae3';
  var $goalStrokeColor2 = '#51e5a8';
  var $strokeColor = '#ebe9f1';
  var $textHeadingColor = '#5e5873';
  var $earningsStrokeColor2 = '#28c76f66';
  var $earningsStrokeColor3 = '#28c76f33';

  var $statisticsOrderChart = document.querySelector('#statistics-order-chart');
  var $statisticsProfitChart = document.querySelector('#statistics-profit-chart');
  var $earningsChart = document.querySelector('#earnings-chart');
  var $revenueReportChart = document.querySelector('#revenue-report-chart');
  var $budgetChart = document.querySelector('#budget-chart');
  var $browserStateChartPrimary = document.querySelector('#browser-state-chart-primary');
  var $browserStateChartWarning = document.querySelector('#browser-state-chart-warning');
  var $browserStateChartSecondary = document.querySelector('#browser-state-chart-secondary');
  var $browserStateChartInfo = document.querySelector('#browser-state-chart-info');
  var $browserStateChartDanger = document.querySelector('#browser-state-chart-danger');
  var $goalOverviewChart = document.querySelector('#goal-overview-radial-bar-chart');

  var statisticsOrderChartOptions;
  var statisticsProfitChartOptions;
  var earningsChartOptions;
  var revenueReportChartOptions;
  var budgetChartOptions;
  var browserStatePrimaryChartOptions;
  var browserStateWarningChartOptions;
  var browserStateSecondaryChartOptions;
  var browserStateInfoChartOptions;
  var browserStateDangerChartOptions;
  var goalOverviewChartOptions;

  var statisticsOrderChart;
  var statisticsProfitChart;
  var earningsChart;
  var revenueReportChart;
  var budgetChart;
  var browserStatePrimaryChart;
  var browserStateDangerChart;
  var browserStateInfoChart;
  var browserStateSecondaryChart;
  var browserStateWarningChart;
  var goalOverviewChart;
  var isRtl = $('html').attr('data-textdirection') === 'rtl';




















  // On load Toast
  setTimeout(function () {
    toastr['success'](
      'You have successfully logged in to Vuexy. Now you can start to explore!',
      '👋 Welcome John Doe!',
      {
        closeButton: true,
        tapToDismiss: false,
        rtl: isRtl
      }
    );
  }, 2000);

/* custom ventes */
  var options = {
          series: [{
            name: "Ventes",
            data: @json($deliveredChart->pluck('value')->toArray())
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        title: {
          text: 'Ventes',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: @json($deliveredChart->pluck('date')->toArray()),
        }
        };

        var chart = new ApexCharts(document.querySelector("#delivered-chart"), options);
        chart.render();


        /* custom returned */
  var options = {
          series: [{
            name: "Retours",
            data: @json($returnedChart->pluck('value')->toArray())
        }],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        colors: ["#FF1654"],
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        title: {
          text: 'Retours',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: @json($returnedChart->pluck('date')->toArray()),
        }
        };

        var chart = new ApexCharts(document.querySelector("#returned-chart"), options);
        chart.render();


});
</script>
