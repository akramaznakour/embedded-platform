
<script type="text/javascript">

 //add event listener to 1nd button
    document.getElementById('download-pdf-bar').addEventListener("click", downloadPDF_bar);

    //download pdf form hidden canvas
    function downloadPDF_bar() {
        var newCanvas = document.querySelector('#barChart');
        //create image from dummy canvas
        var newCanvasImg = newCanvas.toDataURL("image/jpeg", 1.0);
        //creates PDF from img
        var doc = new jsPDF('landscape');
        doc.setFontSize(20);
        doc.addImage(newCanvasImg, 'JPEG', 10, 10, 280, 150);
        doc.save('Humidity_Chart.pdf');
    }

    //add event listener to 2nd button
    document.getElementById('download-pdf-line').addEventListener("click", downloadPDF_line);

    //download pdf form hidden canvas
    function downloadPDF_line() {
        var newCanvas = document.querySelector('#lineChart');

        //create image from dummy canvas
        var newCanvasImg = newCanvas.toDataURL("image/jpeg", 1.0);

        //creates PDF from img
        var doc = new jsPDF('landscape');
        doc.setFontSize(20);
        doc.addImage(newCanvasImg, 'JPEG', 10, 10, 280, 150);
        doc.save('Temperature_chart.pdf');
    }
</script>
