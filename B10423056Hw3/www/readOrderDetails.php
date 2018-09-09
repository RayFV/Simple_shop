<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST['oid']) && isset($_POST['oid']) != "")
{
    // get item account
    $oid = $_POST['oid'];
	$itemid = $_POST['itemid'];
	
    // Get item Details
    $query = "SELECT * FROM orderhistory, odetail WHERE orderhistory.OId = odetail.OId and orderhistory.OId = '$oid' and odetail.ItemID='$itemid'";
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