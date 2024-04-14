<?php
// $servername = 'localhost';
// $username = 'root';
// $password = '';
// $dbname = 'alumnidb';

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'alumni_tracker';


$db = new mysqli($servername, $username, $password, $dbname) or die($db->error);
