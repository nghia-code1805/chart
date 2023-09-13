<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('inputfocus')

<head>
    <title>CHART</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- moment js -->
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<style>
    /* Import Google font - Poppins */
    /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap'); */

    /* * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    } */

    /* body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #060b23;
    } */

    .input-field {
        position: relative;
    }

    .input-field input {
        width: 100%;
        height: 35px;
        border-radius: 6px;
        padding: 0 15px;
        border: 2px solid;
        background: transparent;
        outline: none;
    }

    .input-field .label-control {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        pointer-events: none;
        transition: 0.3s;
    }

    input:focus {
        border: 2px solid;
    }

    input:focus~.label-control,
    input:valid~.label-control {
        top: 0;
        left: 15px;
        font-size: 12px;
        padding: 0 2px;
        background: #fff;
    }
</style>

<body>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- <div>
        <input placeholder="" type="text" class="form-control" id="form-input" value="nghiant">
        <label class="form-label" for="form-input">Placeholder Text</label>
    </div> -->

    <!-- <form>
        <input class="form-control" type="datetime-local" placeholder="select datetime" />
    </form>

    <script>
        config = {
            dateFormat: "d.m.Y",
            maxDate: "today"
        }
        flatpickr("input[type=datetime-local]", config);
    </script> -->

    <!-- <input type="button" value="prev" onclick="selectPrevDay()" />

    <input type="text" id="myDatePicker" data-toggle="flatpickr" style="text-align: center;">

    <input type="button" value="next" onclick="selectNextDay()" /> -->

    <!-- focus input -->
    <!-- <input type="text" class="form-control"> -->
    <br>
    <br>
    <label>nghiNR</label> <br>
    <label>NGHIANT</label>
    <div class="input-field">
        <input type="text" required spellcheck="false">
        <label class="label-control">Enter email</label>
    </div>

    <script>
        // Get a reference to the Flatpickr instance

        var date_now = new Date();
        var date_moment = moment(date_now, "MM-DD-YYYY").locale('ja').format('MMMM Do (dd)');
        // console.log(date_moment.toString());
        // date_moment.locale('ja');
        // date_moment.format('llll');
        // if (date_moment.isValid()) {
        //     console.log(date_moment.date());
        // } else {
        //     console.log('Date is not valid! ');
        // }


        config = {
            // dateFormat: "d.m.Y",
            maxDate: "today",
            defaultDate: "today",
            // altFormat: moment().locale('ja').format('MMMM Do (dd)'),
            dateFormat: moment().locale('ja').format('MMMM Do (dd)'),
            onChange: function(selectedDates, dateStr, instance) {
                document.getElementById('myDatePicker').value = moment(selectedDates[0], "MM-DD-YYYY").locale('ja').format('MMMM Do (dd)');
            }
        }
        var datePicker = flatpickr("#myDatePicker", config);

        const get_id_date = document.getElementById("myDatePicker");
        get_id_date.addEventListener('click', function(event) {
            const get_data_date = event.target.getElementById('myDatePicker');
            console.log("date " + get_data_date);
        })

        // Function to select the previous day
        function selectPrevDay() {
            var currentDate = datePicker.selectedDates[0];
            var newDate = new Date(currentDate);
            newDate.setDate(currentDate.getDate() - 1);
            datePicker.setDate(newDate);
            document.getElementById('myDatePicker').value = moment(newDate, "MM-DD-YYYY").locale('ja').format('MMMM Do (dd)');
        }

        // Function to select the next day
        function selectNextDay() {
            var currentDate = datePicker.selectedDates[0];
            var newDate = new Date(currentDate);
            var date_now = new Date();
            if (currentDate.getDate() < date_now.getDate()) {
                newDate.setDate(currentDate.getDate() + 1);
                datePicker.setDate(newDate);
                document.getElementById('myDatePicker').value = moment(newDate, "MM-DD-YYYY").locale('ja').format('MMMM Do (dd)');
            }
        }
    </script>


    <div class="container">
        <!-- Trigger the modal with a button -->
        <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->


        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Modal Header</h4>
                    </div>
                    <div class="modal-body">
                        <p>Some text in the modal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var open = document.getElementById('openPopup');

        var popupForm = document.getElementById('popup');

        var closePopupButton = document.getElementById('close-popup');


        // Create a date object with the desired date
        const date = new Date();

        // console.log("date: " + date)
        // Current date, you can replace this with any specific date

        // Define an array of weekday names in Japanese
        const japaneseWeekdays = ["日", "月", "火", "水", "木", "金", "土"];

        // Function to add leading zeros to single-digit numbers
        function addLeadingZero(number) {
            return number < 10 ? `0${number}` : number;
        }

        // Get the year in YY format (last two digits of the year)
        const year = date.getFullYear().toString().slice(-2);

        // Get the month and day with leading zeros
        const month = addLeadingZero(date.getMonth() + 1);
        const day = addLeadingZero(date.getDate());

        // Get the weekday in Japanese
        const weekday = japaneseWeekdays[date.getDay()];

        // Format the date in the desired format
        const formattedDate = `${year}/${month}/${day} (${weekday})`;

        // console.log(formattedDate); // Example output: "23/09/04 (火)"
    </script>
    <div id="chartdiv"></div>

    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <!-- Chart code -->
    <script>
        am5.ready(function() {

            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");

            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/xy-chart/
            var chart = root.container.children.push(
                am5xy.XYChart.new(root, {
                    focusable: true,
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    pinchZoomX: true
                })
            );

            var easing = am5.ease.linear;
            chart.get("colors").set("step", 3);

            // Create axes
            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
            var xAxis = chart.xAxes.push(
                am5xy.DateAxis.new(root, {
                    maxDeviation: 0.1,
                    groupData: false,
                    baseInterval: {
                        timeUnit: "day",
                        count: 1
                    },
                    renderer: am5xy.AxisRendererX.new(root, {}),
                    tooltip: am5.Tooltip.new(root, {})
                })
            );

            function createAxisAndSeries(startValue, opposite) {
                var yRenderer = am5xy.AxisRendererY.new(root, {
                    opposite: opposite
                });
                var yAxis = chart.yAxes.push(
                    am5xy.ValueAxis.new(root, {
                        maxDeviation: 1,
                        renderer: yRenderer
                    })
                );

                if (chart.yAxes.indexOf(yAxis) > 0) {
                    yAxis.set("syncWithAxis", chart.yAxes.getIndex(0));
                }

                // Add series
                // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
                var series = chart.series.push(
                    am5xy.LineSeries.new(root, {
                        xAxis: xAxis,
                        yAxis: yAxis,
                        valueYField: "value",
                        valueXField: "date",
                        tooltip: am5.Tooltip.new(root, {
                            labelText: "{valueY}"
                        })
                    })
                );

                //series.fills.template.setAll({ fillOpacity: 0.2, visible: true });
                series.strokes.template.setAll({
                    strokeWidth: 1
                });

                yRenderer.grid.template.set("strokeOpacity", 0.05);
                yRenderer.labels.template.set("fill", series.get("fill"));
                yRenderer.setAll({
                    stroke: series.get("fill"),
                    strokeOpacity: 1,
                    opacity: 1
                });

                // Set up data processor to parse string dates
                // https://www.amcharts.com/docs/v5/concepts/data/#Pre_processing_data
                series.data.processor = am5.DataProcessor.new(root, {
                    dateFormat: "yyyy-MM-dd",
                    dateFields: ["date"]
                });

                series.data.setAll(generateChartData(startValue));
            }

            // Add cursor
            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
                xAxis: xAxis,
                behavior: "none"
            }));
            cursor.lineY.set("visible", false);

            createAxisAndSeries(100, false);
            createAxisAndSeries(50, false);
            createAxisAndSeries(10, false);

            // Make stuff animate on load
            // https://www.amcharts.com/docs/v5/concepts/animations/
            chart.appear(1000, 100);

            // Generates random data, quite different range
            function generateChartData(value) {
                var data = [];
                var firstDate = new Date();
                firstDate.setDate(firstDate.getDate());
                firstDate.setHours(0, 0, 0, 0);

                for (var i = 0; i < 7; i++) {
                    var newDate = new Date(firstDate);
                    newDate.setDate(newDate.getDate() + i);

                    value += Math.round(
                        ((Math.random() < 0.5 ? 1 : -1) * Math.random() * value) / 2
                    );

                    data.push({
                        date: newDate,
                        value: value
                    });
                }
                return data;
            }

        }); // end am5.ready()
    </script>
</body>

</html>