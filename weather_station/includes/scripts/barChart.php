<script type="text/javascript">

if ($('#barChart').length) {

        var ctx2 = document.getElementById("barChart");
        var barChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {

                labels: <?php echo json_encode($database->getAllDays()); ?>,
                datasets: [{
                    label: 'Humidity',
                    backgroundColor: "#03586A",
                    data: <?php echo json_encode($database->getAllHumiditys()); ?>
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMin: 0,
                            max: 100
                        }
                    }]
                }
            }
        });

    }

</script>