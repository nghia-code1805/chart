<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>CHART</title>
</head>

<body>
    <div id="chartdiv"></div>

    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>

    <!-- Resources -->
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/dark.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

    <!-- Chart code -->
    <script>
        am4core.ready(function() {


//  data
    function getChartData() {
        var chartData = [];
        //Подача, м3/сут
        let q = [0,75,150,225,300,327,355,382,409,432,455,477,500,540,580,619,659];
        //Подача, баррель/сут
        let bpd_IN_mpd = 6.289810770432;
        //Напор, м
        let h = [7.1,7.1,6.9,6.5,5.9,5.7,5.5,5.2,4.9,4.6,4.3,4.0,3.5,2.7,1.8,0.8,0.0];
        //КПД
        let eff = [0.0,21.3,39.9,51.6,57.6,59.0,60.2,61.0,61.3,61.0,60.0,58.1,55.1,46.4,33.2,16.7,0.4];
        //Мощность, кВт
        let pow = [0.3,0.3,0.3,0.3,0.4,0.4,0.4,0.4,0.4,0.4,0.4,0.4,0.4,0.4,0.4,0.4,0.3];

        for (var i = 0; i < q.length; i++) {
            chartData.push({
                "flowrate": q[i],
                "bpd": q[i]*bpd_IN_mpd,
                "head":    h[i],
            });
        }
        for (var i = 0; i < q.length; i++) {
            chartData.push({
                "flowrate": q[i],
                "bpd": q[i]*bpd_IN_mpd,
                "kpd":    eff[i],
            });
        }
        for (var i = 0; i < q.length; i++) {
            chartData.push({
                "flowrate": q[i],
                "bpd": q[i]*bpd_IN_mpd,
                "power":      pow[i]
            });
        }
        //console.log(chartData);
        return chartData;
    }


    var colors = [
        '#4A49DB', // H
        '#028000', // Eff
        '#FE2929' // N
    ];


    // Theme

    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.XYChart);


    // Increase contrast by taking evey second color
    //chart.colors.step = 2;

    //
    chart.paddingTop = 40;

    // Add data
    chart.data = getChartData();

    let bpd_IN_mpd = 6.289810770432;

//---- X axes
    //mpd
    var xAxis = chart.xAxes.push(new am4charts.ValueAxis());
    xAxis.renderer.grid.template.location = 0;
    xAxis.renderer.minGridDistance = 50;
    xAxis.title.text = 'barrel per day';
    xAxis.title.fontWeight = 600;
    //bpd
    var xAxisUpper = chart.xAxes.push(new am4charts.ValueAxis());
    xAxisUpper.renderer.grid.template.location = 0;
    xAxisUpper.renderer.minGridDistance = 50*bpd_IN_mpd;
    xAxisUpper.title.text = 'litres per day';
    xAxisUpper.title.fontWeight = 600;
    xAxisUpper.renderer.opposite = true;





// Create series
   createAxisAndSeries("head", "flowrate",  "head", colors[0],  false,false, 60, [0.8,0.8], false);
    createAxisAndSeries("kpd", "flowrate",  "efficiency", colors[1],  false,true, -80, [0.8,0.8], 100);
   createAxisAndSeries("power", "flowrate",  "power", colors[2],  false,false, -80, [0.7,1], false);
    // createAxisAndSeries("napor", "bpd",  "Напор", colors[0],  false,false, 60);
    // createAxisAndSeries("kpd", "bpd",  "КПД", colors[1],  true,true, -80);
    // createAxisAndSeries("power", "bpd",  "Мощность", colors[2],  true,false, -80);

    function createAxisAndSeries(fieldY,fieldX, name, color, opposite, showgrid, titleXoffset, tension=[0.8,1], maxValue) {

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

        valueAxis.renderer.grid.template.disabled = !showgrid;
        // 
        valueAxis.renderer.opposite = opposite;

        if(chart.yAxes.indexOf(valueAxis) != 0){
            //
            valueAxis.syncWithAxis = chart.yAxes.getIndex(0);
        }
        
            valueAxis.min=0;
        if(maxValue){
            //valueAxis.extraMax = 0;
            valueAxis.max=maxValue;
            //valueAxis.strictMinMax=true;
        }
        //
        // valueAxis.paddingLeft = 10;
        // valueAxis.paddingRight = 10;
         //valueAxis.layout = "absolute";
        // // Set up axis title
        valueAxis.title.text = name;
        valueAxis.title.layout = "absolute";
        valueAxis.title.rotation = 0;
        valueAxis.title.align = "left";
        valueAxis.title.valign = "top";
        valueAxis.title.dy = -40;
        valueAxis.title.dx = titleXoffset;
        valueAxis.title.fontWeight = 600;
        valueAxis.title.fill = am4core.color(color);
        // valueAxis.equalSpacing = true
        // valueAxis.usePrefixes = true


        var series = chart.series.push(new am4charts.LineSeries());
        series.dataFields.valueY = fieldY;
        series.dataFields.valueX = fieldX;
        //series.dataFields.valueX = 'bpd';
        series.strokeWidth = 2;
        series.stroke = am4core.color(color);;
        series.yAxis = valueAxis;
        series.name = name;
        series.tooltipText = "{name}: [bold]{valueY}[/]";
        series.tensionX = tension[0];
        series.tensionY = tension[1];
        series.showOnInit = true;



        valueAxis.renderer.line.strokeOpacity = 1;
        valueAxis.renderer.line.strokeWidth = 1;
        valueAxis.renderer.line.stroke = am4core.color(color);
        valueAxis.renderer.labels.template.fill = am4core.color(color);
        valueAxis.renderer.opposite = opposite;


        valueAxis.renderer.ticks.template.disabled = false;
        valueAxis.renderer.ticks.template.strokeOpacity = 1;
        valueAxis.renderer.ticks.template.stroke = am4core.color(color);
        valueAxis.renderer.ticks.template.strokeWidth = 1;
        valueAxis.renderer.ticks.template.length = 8;
    }



// Add legend
    chart.legend = new am4charts.Legend();

// Add cursor
    chart.cursor = new am4charts.XYCursor();


}); // end am4core.ready()
    </script>
</body>

</html>