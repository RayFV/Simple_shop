<?php
// check request
if(isset($_POST['sid']) && isset($_POST['sid']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get supplier id
    $sid = $_POST['sid'];
    // delete supplier
    $query = "DELETE FROM supplier WHERE SId = '$sid'";
    if (!$result = mysqli_query($conn, $query)) {
        exit(mysqli_error($conn));
    }
}
else{
	echo 'ERROR';
}
?>