<?php
// Original file path
$original_file_path = '/home/kali/micro/auth/usernames.dat';

// Check if the usernames.dat file exists
if (file_exists($original_file_path)) {
    $file_content = file_get_contents($original_file_path);
    if ($file_content !== false) {
        echo "<pre>" . htmlspecialchars($file_content) . "</pre>";
        
        // Add a button to go back to the chart
        echo '<form action="view_chart.php" method="post"><input type="submit" value="Go Back to Chart"></form>';
    } else {
        echo 'Unable to read usernames.dat file.';
    }
} else {
    echo 'Usernames.dat file not found.';
}
?>
