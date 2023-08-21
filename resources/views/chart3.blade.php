<!DOCTYPE HTML>
<html>

<head>
	<script>
		window.onload = function() {
			var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					text: "Weekly Revenue Analysis for First Quarter"
				},
				axisY: [{
						title: "Order",
						lineColor: "#C24642",
						tickColor: "#C24642",
						labelFontColor: "#C24642",
						titleFontColor: "#C24642",
						includeZero: true
					},
					{
						title: "Footfall",
						lineColor: "#369EAD",
						tickColor: "#369EAD",
						labelFontColor: "#369EAD",
						titleFontColor: "#369EAD",
						includeZero: true
					},
					{
						title: "Revenue",
						lineColor: "#7F6084",
						tickColor: "#7F6084",
						labelFontColor: "#7F6084",
						titleFontColor: "#7F6084",
						includeZero: true
					}
				],
				// axisY2: {
				// 	title: "Revenue",
				// 	lineColor: "#7F6084",
				// 	tickColor: "#7F6084",
				// 	labelFontColor: "#7F6084",
				// 	titleFontColor: "#7F6084",
				// 	includeZero: true
				// },
				toolTip: {
					shared: true
				},
				legend: {
					cursor: "pointer",
					itemclick: toggleDataSeries
				},
				data: [{
						type: "line",
						name: "Footfall",
						color: "#369EAD",
						showInLegend: true,
						axisYIndex: 1,
						dataPoints: [{
								x: new Date(2017, 00, 7),
								y: 85.4
							},
							{
								x: new Date(2017, 00, 14),
								y: 92.7
							},
							{
								x: new Date(2017, 00, 21),
								y: 64.9
							},
							{
								x: new Date(2017, 00, 28),
								y: 58.0
							},
							{
								x: new Date(2017, 01, 4),
								y: 63.4
							},
							{
								x: new Date(2017, 01, 11),
								y: 69.9
							},
							{
								x: new Date(2017, 01, 18),
								y: 88.9
							},
							{
								x: new Date(2017, 01, 25),
								y: 66.3
							},
							{
								x: new Date(2017, 02, 4),
								y: 82.7
							},
							{
								x: new Date(2017, 02, 11),
								y: 60.2
							},
							{
								x: new Date(2017, 02, 18),
								y: 87.3
							},
							{
								x: new Date(2017, 02, 25),
								y: 98.5
							}
						]
					},
					{
						type: "line",
						name: "Order",
						color: "#C24642",
						axisYIndex: 0,
						showInLegend: true,
						dataPoints: [{
								x: new Date(2017, 00, 7),
								y: 32.3
							},
							{
								x: new Date(2017, 00, 14),
								y: 33.9
							},
							{
								x: new Date(2017, 00, 21),
								y: 26.0
							},
							{
								x: new Date(2017, 00, 28),
								y: 15.8
							},
							{
								x: new Date(2017, 01, 4),
								y: 18.6
							},
							{
								x: new Date(2017, 01, 11),
								y: 34.6
							},
							{
								x: new Date(2017, 01, 18),
								y: 317.7
							},
							{
								x: new Date(2017, 01, 25),
								y: 24.7
							},
							{
								x: new Date(2017, 02, 4),
								y: 35.9
							},
							{
								x: new Date(2017, 02, 11),
								y: 12.8
							},
							{
								x: new Date(2017, 02, 18),
								y: 38.1
							},
							{
								x: new Date(2017, 02, 25),
								y: 42.4
							}
						]
					},
					{
						type: "line",
						name: "Revenue",
						color: "#7F6084",
						axisYIndex: 2,
						showInLegend: true,
						dataPoints: [{
								x: new Date(2017, 00, 7),
								y: 42.5
							},
							{
								x: new Date(2017, 00, 14),
								y: 44.3
							},
							{
								x: new Date(2017, 00, 21),
								y: 28.7
							},
							{
								x: new Date(2017, 00, 28),
								y: 22.5
							},
							{
								x: new Date(2017, 01, 4),
								y: 25.6
							},
							{
								x: new Date(2017, 01, 11),
								y: 45.7
							},
							{
								x: new Date(2017, 01, 18),
								y: 54.6
							},
							{
								x: new Date(2017, 01, 25),
								y: 32.0
							},
							{
								x: new Date(2017, 02, 4),
								y: 43.9
							},
							{
								x: new Date(2017, 02, 11),
								y: 26.4
							},
							{
								x: new Date(2017, 02, 18),
								y: 40.3
							},
							{
								x: new Date(2017, 02, 25),
								y: 54.2
							}
						]
					}
				]
			});
			chart.render();

			var data = chart.options.data;

			var dataPoints = [];
			for (var i = 0; i < data.length; i++) {
				dataPoints = data[i].dataPoints;

				console.log(dataPoints);
			}

			var myChart = new Chart(chart, {
				date: x,
				data: y
			});

			console.log(myChart)

			function toggleDataSeries(e) {
				if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
					e.dataSeries.visible = false;
				} else {
					e.dataSeries.visible = true;
				}
				e.chart.render();
			}

		}

	</script>
</head>

<body>
	<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	<table id="tableData">
		<tr>
			<td> date</td>
			<td> CMI</td>
			<td> KG</td>
			<td> CM</td>
		</tr>
	</table>

	<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>