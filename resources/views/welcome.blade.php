<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>CHART</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        /* Style for the popup background */
        .popup-bg {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1;
        }

        /* Style for the popup content */
        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Style for the close button */
        .close-button {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>date time</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a style="cursor: pointer;" id="openPopup">23/7/15 (月)</a></td>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>23/7/20 (火)</td>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
            </tr>
            <tr>
                <td>23/7/30 (金)</td>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
            </tr>
        </tbody>
    </table>

    <div class="popup-bg" id="popup">
        <div class="popup-content">
            <span class="close-button" id="close-popup">&times;</span>
            <h2>Popup Form</h2>
            <form>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

    <script>
        var open = document.getElementById('openPopup');

        var popupForm = document.getElementById('popup');

        var closePopupButton = document.getElementById('close-popup');

        open.addEventListener("click", () => {
            popupForm.style.display = 'block';
        })

        closePopupButton.addEventListener("click", () => {
            popupForm.style.display = 'none';
        })


        // Create a date object with the desired date
        const date = new Date();

        console.log("date: " + date)
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

        console.log(formattedDate); // Example output: "23/09/04 (火)"
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