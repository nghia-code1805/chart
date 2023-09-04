<!DOCTYPE html>
<html>

<head>
    <title>Multiple Button Chart.js Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div>
        <canvas width="400" height="100" id="myChart"></canvas>
    </div>
    <div>
        <button id="dataset1">Dataset 1</button>
        <button id="dataset2">Dataset 2</button>
    </div>
    <script>
        const data1 = [{
                label: 'Dataset 1',
                data: [10, 23, 12, 45, 22, 45, 31],
                yAxisID: 'y-axis-1', // Associate with the first y-axis
                fill: false
            },
            {
                label: 'Dataset 2',
                data: [15, 42, 21, 23, 44, 22, 21],
                yAxisID: 'y-axis-2', // Associate with the second y-axis
                fill: false
            }
        ];
        const data2 = [5, 15, 25, 15, 10];


        var currentData = [];
        for (var i = 0; i < data1.length; i++){
            currentData = data1[i].data;
        }
        // Initial dataset
        console.log(currentData);
        // Create the chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
                datasets: [{
                    label: 'Current Dataset',
                    data: data1,
                    borderColor: 'blue',
                    borderWidth: 1,
                    fill: false,
                }],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                    yAxes: [{
						type: 'linear',
						id: 'y-axis-1',
						display: true,
						position: 'left'
					},
					{
						type: 'linear',
						display: true,
						id: 'y-axis-2',
						position: 'left'
					}
				]
                },
            },
        });

        // Button click event handlers
        document.getElementById('dataset1').addEventListener('click', () => {
            currentData = data1;
            updateChart();
        });

        document.getElementById('dataset2').addEventListener('click', () => {
            currentData = data2;
            updateChart();
        });

        // Function to update the chart with the current dataset
        function updateChart() {
            myChart.data.datasets[0].data = currentData;
            myChart.update();
        }
    </script>
</body>

</html>