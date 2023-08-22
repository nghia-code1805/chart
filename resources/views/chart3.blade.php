<!DOCTYPE html>
<html>

<head>
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

		// Define multiple y-axes
		var options = {
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
	</script>
</body>

</html>