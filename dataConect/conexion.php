<?php
//include '../BackEndSAP/session.php';
$servername = "192.169.190.49";
$username = "universidaducp_scholatek";
$password = "Ht18a9sol12MX87";
$dbname = "universidaducp_saem_desa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_query($conn,"SET CHARACTER SET 'utf8'");
// Check connection
//echo 'Connected!';
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 