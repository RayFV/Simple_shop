<?php
// check request
if(isset($_POST['oid']) && isset($_POST['oid']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get order id
    $oid = $_POST['oid'];
	$itemid = $_POST['itemid'];
    // delete odetail first, if it have only 1 OId in odetail, delete orderhistory too
	$result = mysqli_query($conn, "select count(*) as count from odetail where OId='$oid'");
	$row = mysqli_fetch_assoc($result);
	if($row['count'] > 1){
		$query = "DELETE FROM odetail WHERE OId = '$oid' and ItemID='$itemid'";
		$result = mysqli_query($conn, $query);
	}else{
		$query = "DELETE FROM odetail WHERE OId = '$oid' and ItemID='$itemid'; DELETE from orderhistory where OId='$oid'";
		$result = mysqli_multi_query($conn, $query);
	}
    if (!$result) {
        exit(mysqli_error($conn));
    }
}
else{
	echo 'ERROR';
}
?>