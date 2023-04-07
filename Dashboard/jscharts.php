<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charts and Analytics</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    	<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->

<!-- Bootstrap JavaScript -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script> -->
     
</head>
<body>
    
<div class="container">

    <canvas id="myChart"></canvas>
    <canvas id="pieChart"></canvas>
</div>
 <script src="charts.js"></script>
 <script>
// Retrieve data from separate PHP script and convert to JavaScript object
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);

        // Draw chart with data
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {}
        });
    }
};
xhr.open("GET", "get_chart_data.php", true);
xhr.send();
</script>
</body>
</html>