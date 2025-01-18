<?php
// Specified file path for storing existing emails
$specified_file_path = '/home/kali/micro/auth/backup.txt';

// Check if the backup file exists
if (file_exists($specified_file_path)) {
    $file_content = file_get_contents($specified_file_path);
    if ($file_content !== false) {
        echo "<pre>" . htmlspecialchars($file_content) . "</pre>";
        
        // Add a button to go back to usernames.dat
        echo '<form action="view_usernames.php" method="post"><input type="submit" value="Go Back to Usernames.dat"></form>';
    } else {
        echo 'Unable to read backup file.';
    }
} else {
    echo 'Backup file not found.';
}
?>
