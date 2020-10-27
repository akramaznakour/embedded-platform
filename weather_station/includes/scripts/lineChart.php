<script type="text/javascript">

if ($('#lineChart').length) {

        var t = document.getElementById("lineChart");
        var lineChart = new Chart(t, {
            type: 'line',
            data: {
                labels: <?php echo json_encode($database->getAllDays()); ?>,
                datasets: [{
                    label: "Temperature",
                    backgroundColor: "rgba(38, 185, 154, 0.31)",
                    borderColor: "rgba(38, 185, 154, 0.7)",
                    pointBorderColor: "rgba(38, 185, 154, 0.7)",
                    pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                    borderWidth: 1,
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointBorderWidth: 1,
                    data: <?php echo json_encode($database->getAllTemperatures()); ?>
                }]
            },
            responsive: true,
            animation: true,
            showScale: true,
            animate: {
                animateRotate: true,
                duration: 1000,
                animateScale: true,
                animationSteps: 15
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMin: 0,
                            max: 60
                        }
                    }]
                }
            }
        });

    }

</script>