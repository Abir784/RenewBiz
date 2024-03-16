<!-- Muse Javascript Plugins -->
<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/lodash/lodash.min.js"></script>
<script src="../assets/vendor/highcharts/highmaps.js"></script>
<script src="../assets/vendor/highcharts/modules/data.js"></script>
<script src="../assets/vendor/highcharts/mapdata/countries/us/us-all.js"></script>
<script src="../assets/vendor/simplebar/dist/simplebar.min.js"></script>
<script src="../assets/js/theme-custom.js"></script>
<script>
//Muse Chart Radius JavaScript
Highcharts.wrap(Highcharts.seriesTypes.column.prototype, 'translate', function (proceed) {
  proceed.apply(this, [].slice.call(arguments, 1));
  var series = this,
  cpw = 0.166,
  shapeArgs,
  x, y, h, w;
  Highcharts.each(series.points, function (point) {
    shapeArgs = point.shapeArgs;
    x = shapeArgs.x;
    y = shapeArgs.y;
    h = shapeArgs.height;
    w = shapeArgs.width;
    point.shapeType = 'path';
    if (point.negative) {
      point.shapeArgs = {
        d: [
          'M', x, y,
          'L', x, y + h - w/2,
          'C', x, y + h + w/5, x + w, y + h + w/5, x + w, y + h - w/2, 'L', x + w, y,
          'L', x, y
        ]
      };
    }
    else {
      point.shapeArgs = {
      d: [
        'M', x, y + w/2,
        'L', x, y + h,
        'L', x + w, y + h,
        'L', x + w, y + w/2,
        'C', x + w, y - w/5, x, y - w/5, x, y + w/2]
      };
    }
  });
});

//Muse Columns Chart JavaScript
Highcharts.chart('MuseColumnsChartOne', {
  chart: {
    type: 'column',
    spacingTop: 0,
    spacingBottom: 0,
    spacingLeft: 0,
    spacingRight: 0,
    backgroundColor: null,
  },
  title: {
    text: '',
  },
  legend: {
    enabled: false,
  },
  credits: {
    enabled: false,
  },
  xAxis: {
    lineColor: 'transparent',
    tickLength: 0,
    labels: {
      enabled: false,
    },
  },
  yAxis: {
    gridLineColor: 'transparent',
    title: {
      text: '',
    },
    labels: {
      enabled: false,
    },
  },
  tooltip: {
    enabled: false,
  },
  plotOptions: {
    column: {
      borderRadius: 4,
      borderWidth: 0,
    }
  },
  series: [{
    data: [100, 50, 40, 95, 75, 95, 85],
    color: '#006EFF',
  }]
});

//Muse Single Line Chart JavaScript
Highcharts.chart('MuseMultipleColumnsChartOne', {
  chart: {
    type: 'column',
    backgroundColor: null,
  },
  title: {
    text: '',
  },
  credits: {
    enabled: false,
  },
  xAxis: {
    lineWidth: 0,
    categories: ['Jan 1', 'Jan 2', 'Jan 3', 'Jan 4', 'Jan 5', 'Jan 6', 'Jan 7', 'Jan 8', 'Jan 9', 'Jan 10', 'Jan 11', 'Jan 12'],
    labels: {
      style: {
        color: '#ADB5BD',
        fontSize: '12px',
        fontFamily: "'Open Sans', sans-serif",
      },
    },
  },
  yAxis: {
    gridLineColor: 'rgba(173,181,189,0.3)',
    gridLineDashStyle: 'longdash',
    title: {
      text: '',
    },
    lineWidth: 0,
    lineColor: '#EAEAEA',
    labels: {
      style: {
        color: '#6C757D',
        fontSize: '13px',
        fontFamily: "'Open Sans', sans-serif",
      },
    },
  },
  legend: {
    align: 'left',
    verticalAlign: 'top',
    itemStyle: {
      color: '#6C757D',
      fontSize: '13px',
      fontWeight: 'normal',
      fontFamily: "'Open Sans', sans-serif",
    },
    margin: 50,
    padding: 0,
    symbolWidth: 12,
    symbolHeight: 12,
    itemDistance: 30,
    symbolPadding: 8,
  },
  plotOptions: {
    series: {
      lineWidth: 1,
    },
    column: {
      borderWidth: 0,
    },
  },
  series: [{
    name: '2020',
    color: '#3485FD',
    data: [42, 82, 85, 70, 78, 48, 78, 48, 48, 46, 45, 48],
  },
  {
    name: '2021',
    color: '#E6F0FF',
    data: [84, 70, 62, 50, 48, 65, 88, 68, 65, 63, 64, 65],
  }]
});

//Muse Pie Chart JavaScript
Highcharts.chart('MusePieChartOne', {
  chart: {
    type: 'pie',
    backgroundColor: null,
  },
  title: {
    text: '',
  },
  credits: {
    enabled: false,
  },
  xAxis: {
    lineColor: 'transparent',
    tickLength: 0,
    labels: {
      enabled: false,
    },
  },
  yAxis: {
    gridLineColor: 'transparent',
    title: {
      text: '',
    },
    labels: {
      enabled: false,
    },
  },
  legend: {
    itemStyle: {
      color: '#6C757D',
      fontSize: '12px',
      fontWeight: '500',
      fontFamily: "'Open Sans', sans-serif",
    },
    margin: 30,
    padding: 0,
    symbolWidth: 11,
    symbolHeight: 11,
    itemDistance: 30,
    symbolPadding: 10,
  },
  plotOptions: {
    pie: {
      size: 230,
      borderWidth: 0,
      allowPointSelect: true,
    },
    series: {
      lineWidth: 0,
    },
    column: {
      pointPadding: 0,
      borderWidth: 0,
      pointWidth: 1,
    },
  },
  accessibility: {
    announceNewData: {
      enabled: true,
    },
    point: {
      valueSuffix: '%',
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
  },
  series: [{
    innerSize: '86%',
    dataLabels: [{
      enabled: false,
    }],
    name: 'Browsers',
    showInLegend: true,
    data: [
      {name: 'Direct', y: 20, color: '#81B4FE',},
      {name: 'Refferal', y: 15, color: '#E6F0FF',},
      {name: 'Social', y: 36, color: '#3485FD',}],
    }
  ],
});

//Muse Map Chart JavaScript
Highcharts.getJSON('https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/us-population-density.json', function (data) {
  data.forEach(function (p) {
    p.code = p.code.toUpperCase();
  });
  Highcharts.mapChart('MuseMapChart', {
    chart: {
      map: 'countries/us/us-all',
      backgroundColor: false,
    },
    title: {
      text: ''
    },
    legend: {
      enabled: false
    },
    credits: {
      enabled:false
    },
    mapNavigation: {
      enabled: false
    },
    colorAxis: {
      min: 1,
      type: 'logarithmic',
      minColor: '#EEEEFF',
      maxColor: '#000022',
      stops: [
        [0, '#262f8a'],
        [0.67, '#2d519d'],
        [1, '#262f8a']
      ]
    },
    plotOptions: {
      series: {
        borderColor: 'rgba(255,255,255,0.05)',
        dataLabels: [{
          enabled: false,
        }],
      },
    },
    series: [{
      animation: {
        duration: 1000
      },
      data: data,
      joinBy: ['postal-code', 'code'],
      dataLabels: {
        enabled: true,
        color: '#FFFFFF',
        format: '{point.code}'
      },
    }]
  });
});
</script>
</body>
</html>