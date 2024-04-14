<?php
session_start();
if (!isset($_SESSION['userid'])){
header('location:../pages/login.php');
}
$id_session=$_SESSION['userid'];

?>