<?php
    // $sql = "SELECT plan,COUNT(id) as subscribers FROM registration GROUP BY plan";
    // $query = mysqli_query($conn, $sql);
    // $plans =  [];
    // while($result = mysqli_fetch_assoc($query)){
    //     $plans["{$result['plan']}"] = $result["subscribers"];
    // }
    $plans = [
        "basic" => 3,
        "standard" => 4,
        "premium" => 2,
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<body>
    <div style="height:300px">
        <canvas id="plans_statistic"></canvas>
    </div>

    <script>

        const ctx = document.getElementById('plans_statistic');
        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ['basic','standard','premium'],
            datasets: [{
                label: 'Subscribers',
                data: ["<?php echo($plans["basic"]) ?>","<?php echo($plans["standard"]) ?>","<?php echo($plans["premium"]) ?>"],
                backgroundColor: [
                    'rgba(255, 219, 88, 1.2)',
                    'rgba(228, 0, 128, 1.0)',
                    'rgba(0, 71, 71, 1.2)',
                ],
                borderColor: [
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                    'rgb(0, 0, 0)',
                ],
                borderWidth: 1
            }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        });

    </script>
</body>
</html>