<?php
include('config/connection.php');
$query = "SELECT * FROM data ORDER BY id DESC LIMIT 100";
$waktu = mysqli_query($conn, $query);
$voltage = mysqli_query($conn, $query);

$current = mysqli_query($conn, $query);
?>

<?php include('layout/header.php') ?>
<?php include('layout/navbar.php') ?>
<div class="container">

    <h1>Dashboard</h1>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div>
        <canvas id="myChart"></canvas>
    </div>
    <div>
        <canvas id="myChart2"></canvas>
    </div>
    <script>

        const labels = [
            <?php
            while ($row = mysqli_fetch_array($waktu)) {
                echo "'" . $row['waktu'] . "', ";
            } ?>
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    <?php
                    while ($row = mysqli_fetch_array($voltage)) {
                        echo $row['voltage'] . ", ";
                    } ?>
                ],
            }]
        };
        const config = {
            type: 'line',
            data: data,
            options: {
                animation: {
                    duration: 0
                },
            }
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        
        const data2 = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: '#r454t4',
                borderColor: 'rgb(255, 99, 132)',
                data: [
                    <?php
                    while ($row = mysqli_fetch_array($current)) {
                        echo $row['current'] . ", ";
                    } ?>
                ],
            }]
        };
        const config2 = {
            type: 'line',
            data: data2,
            options: {
                animation: {
                    duration: 0
                },
            }
        };
        const myChart2 = new Chart(
            document.getElementById('myChart2'),
            config2
        );

    </script>
</div>
<?php include('layout/footer.php') ?>