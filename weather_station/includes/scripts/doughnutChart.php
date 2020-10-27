<script type="text/javascript">

    var deliveredData = {
        labels: [
            "Value"
        ],
        datasets: [
            {
                data: [<?php echo $database->getToday_result()->getHumidity () ?>, 100-<?php echo $database->getToday_result()->getHumidity() ?>],
                backgroundColor: [
                    "#1ABB9C",
                    "#EDEDED"
                ],
                hoverBackgroundColor: [
                    "#73879C",
                    "#73879C"
                ],
                borderWidth: [
                    0, 0
                ]
            }]
    };
    if ($('#openedCanvas').length) {

        var deliveredOpt = {
            cutoutPercentage: 80,
            animation: {
                animationRotate: true,
                duration: 2000
            },
            legend: {
                display: false
            },
            tooltips: {
                enabled: false
            }
        };

        var openedCanvas = new Chart($('#openedCanvas'), {
            type: 'doughnut',
            data: deliveredData,
            options: deliveredOpt
        });


    }

    
</script>