<?php
// check request
if(isset($_POST['itemid']) && isset($_POST['itemid']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get item id
    $itemid = $_POST['itemid'];
    // delete item
    $query = "DELETE FROM iteminfo WHERE ItemID = '$itemid'";
    if (!$result = mysqli_query($conn, $query)) {
        exit(mysqli_error($conn));
		$response = 0;
		echo json_encode($response);
    }
}
else{
	echo 'ERROR';
}
?>