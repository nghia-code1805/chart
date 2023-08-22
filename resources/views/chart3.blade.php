<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<title>Multi-Axis Line Chart</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
	<canvas id="myChart" width="400" height="100"></canvas>
	<script>
		var ctx = document.getElementById('myChart').getContext('2d');

		// Sample data for two datasets
		var data = {
			labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
			datasets: [{
					label: 'Dataset 1',
					data: [10, 23, 12, 45, 22, 45, 31],
					yAxisID: 'y-axis-1', // Associate with the first y-axis
					borderColor: 'red',
					backgroundColor: 'rgba(255, 0, 0, 0.2)',
					fill: false
				},
				{
					label: 'Dataset 2',
					data: [15, 42, 21, 23, 44, 22, 21],
					yAxisID: 'y-axis-2', // Associate with the second y-axis
					borderColor: 'blue',
					backgroundColor: 'rgba(0, 0, 255, 0.2)',
					fill: false
				}
			]
		};

		const footer = (data) => {
			let sum = 0;

			data.forEach(function(tooltipItem) {
				sum += tooltipItem.parsed.y;
			});
			return 'Sum: ' + sum;
		};

		// Define multiple y-axes
		var options = {
			interaction: {
				intersect: false,
				mode: 'index',
			},
			plugins: {
				tooltip: {
					callbacks: {
						footer: footer,
					}
				}
			},
			scales: {
				yAxes: [{
						type: 'linear',
						id: 'y-axis-1',
						display: true,
						position: 'left',
						ticks: {
							beginAtZero: true
						}
					},
					{
						type: 'linear',
						display: true,
						id: 'y-axis-2',
						position: 'left',
						ticks: {
							beginAtZero: true
						}
					}
				]
			}
		};

		var myChart = new Chart(ctx, {
			type: 'line',
			data: data,
			options: options
		});

		var xAxesData = myChart.data.labels;
		console.log(xAxesData);

		var datasets = myChart.data.datasets;

		datasets.forEach(function(dataset) {
			var yAxisData = dataset.data; // This array contains the y-axis data for the current dataset
			var label = dataset.label; // The label of the current dataset

			console.log("Y-axis data for dataset '" + label + "':", yAxisData);
		});
	</script>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Date</th>
				<th>S1</th>
				<th>S2</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				@foreach($xAxesData as x)
				<td>x</td>
				@endforeach
				<td>Doe</td>
				<td>john@example.com</td>
			</tr>
		</tbody>
	</table>
</body>

</html>