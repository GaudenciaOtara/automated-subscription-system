<?php
// Connect to database
$conn = mysqli_connect('localhost', 'username', 'password', 'sub_system');




// Query to retrieve number of user registrations for the past 7 days
$query = "SELECT COUNT(*) AS count FROM user_registrations WHERE registration_date >= DATE_SUB(NOW(), INTERVAL 7 DAY) GROUP BY DATE(registration_date)";
$result = mysqli_query($conn, $query);

// Create array to hold data for chart
$data = array();
$data['labels'] = array();
$data['datasets'][0]['label'] = 'New Businesses(This Week)';
$data['datasets'][0]['data'] = array();
$data['datasets'][0]['backgroundColor'] = '#15a362';
$data['datasets'][0]['borderColor'] = '#15a362';

// Loop through result set and add data to chart array
while ($row = mysqli_fetch_assoc($result)) {
    $data['labels'][] = date('D', strtotime($row['registration_date']));
    $data['datasets'][0]['data'][] = $row['count'];
}

// Convert data to JSON and output
header('Content-Type: application/json');
echo json_encode($data);
?>
