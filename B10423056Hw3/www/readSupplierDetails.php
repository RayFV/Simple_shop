<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['sid']) && isset($_POST['sid']) != "")
{
    // get supplier account
    $sid = $_POST['sid'];

    // Get supplier Details
    $query = "SELECT * FROM supplier WHERE SId = '$sid'";
    if (!$result = mysqli_query($conn, $query)) {
        exit(mysqli_error($conn));
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
?>