<?php
// File path for the chart data
$chart_data_file = '/home/kali/micro/auth/chart_data.json';

// Read the chart data from the JSON file
$chart_data = json_decode(file_get_contents($chart_data_file), true);

// Output the chart using Chart.js
echo '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
echo '<canvas id="passwordChart" width="400" height="200"></canvas>';
echo '<script>';
echo 'var ctx = document.getElementById("passwordChart").getContext("2d");';
echo 'var chart = new Chart(ctx, {';
echo 'type: "line",';
echo 'data: {';
echo 'labels: ' . json_encode($chart_data) . ',';
echo 'datasets: [{';
echo 'label: "Invalid Passwords",';
echo 'data: Array.from({ length: ' . count($chart_data) . ' }, (_, index) => index + 1),';
echo 'borderColor: "rgba(75, 192, 192, 1)",';
echo 'borderWidth: 2';
echo '}]';
echo '},';
echo 'options: {';
echo 'scales: {';
echo 'xAxes: [{';
echo 'type: "time",';
echo 'time: {';
echo 'unit: "minute",';
echo 'displayFormats: {';
echo 'minute: "HH:mm"';
echo '}';
echo '}';
echo '}]';
echo '}';
echo '}';
echo '});';
echo '</script>';
?>
