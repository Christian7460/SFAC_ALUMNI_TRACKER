<?php
session_start();
require '../../../includes/conn.php';

if (isset($_POST['submit'])) {
    // Get the batch value from the form input and escape special characters to prevent SQL injection
    $batchInput = mysqli_real_escape_string($db, $_POST['batch']);

    $batch = "Batch-" . $batchInput;
    
    // Insert the concatenated value into the database
    $insertBatch = mysqli_query($db, "INSERT INTO tbl_batch (batch) VALUES ('$batch')") or die(mysqli_error($db));
    
    // Set session variable to indicate success and redirect
    $_SESSION['addBatch'] = true;
    header("location: ../add-batch.php");
}
?>