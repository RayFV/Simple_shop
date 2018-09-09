<?php
// check request
if(isset($_POST['account']) && isset($_POST['account']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get user id
    $account = $_POST['account'];
    // delete User
    $query = "DELETE FROM member WHERE Account = '$account'";
    if (!$result = mysqli_query($conn, $query)) {
        exit(mysqli_error($conn));
    }
}
else{
	echo 'ERROR';
}
?>