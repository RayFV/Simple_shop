<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['account']) && isset($_POST['account']) != "")
{
    // get User account
    $account = $_POST['account'];

    // Get User Details
    $query = "SELECT * FROM member WHERE Account = '$account'";
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