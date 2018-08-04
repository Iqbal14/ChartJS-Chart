<?php 
include 'config.php';
$bulan       = mysqli_query($dbconnect, "SELECT bulan FROM penjualan WHERE tahun='2016' order by id asc");
$penghasilan = mysqli_query($dbconnect, "SELECT hasil_penjualan FROM penjualan WHERE tahun='2016' order by id asc");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CDN ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="asset/css/index.css">
    <title>Chart JS</title>
</head>
<body>
<div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while ($bulan_bulan = mysqli_fetch_array($bulan)) { echo '"'.$bulan_bulan['bulan'].'",';} ?>],
                    datasets: [{
                            label: '# of Votes',
                            data: [<?php while ($hasil = mysqli_fetch_array($penghasilan)) { echo '"'.$hasil['hasil_penjualan'].'",';} ?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
</body>
</html>