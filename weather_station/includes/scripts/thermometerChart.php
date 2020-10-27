
<script type="text/javascript">


window.onload = function () {
    var thermometer = new RGraph.Thermometer({
        id: 'cvs',
        min: -10,
        max: 50,
        value: <?php echo $database->getToday_result()->getTemperature() ?>,
        options: {
            scaleVisible: true,
            valueLabel: true,
            textAccessible: true,
        }
    }).grow()
  };
        
</script>