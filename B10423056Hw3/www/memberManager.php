<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>管理系統</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
 <!-- JS and CSS setting -->
<script>
  function DeleteMember(account) {
    var conf = confirm("Warning!!!!!!!!!!!!!!:\nDo you really want to delete -----" + account + "-----?");
	
    if (conf == true) {
        $.post("deleteMember.php", {
                account: account
            }
        );
		window.location = "success.php?type=deleteMember";
    }
  }

function GetUserDetails(account) {
    // Add User ID to the hidden field for furture usage
	$("#hidden_user_account").val(account);
    $.post("readUserDetails.php", {
            account: account
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_account").val(user.Account);
            $("#update_password").val(user.Password);
            $("#update_name").val(user.Name);
			$("#update_birthday").val(user.Birthday);
            $("#update_address").val(user.Address);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}
</script>
 <style>
a:link#a001, a:visited#a001 {
    color: white;
    padding: 5px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    color: (internal value);
    cursor: auto;
}

a:hover#a001, a:active#a001 {
    color: green;
}

</style>  
 
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#" id ="a001">
                        <!--<img src="assets/img/logo.png" />-->
						<h1>管理系統</h1>

                    </a>
                    
                </div>
              
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li >
                        <a href="index.php" ><i class="fa fa-desktop "></i>Home</a>
                    </li>
                   

                    <li class="active-link">
                        <a href="memberManager.php"><i class="fa fa-edit "></i>會員管理   <span class="badge">New Features</span></a>
                    </li>
                    <li>
                        <a href="itemManager.php"><i class="fa fa-edit "></i>產品管理   <span class="badge">New Features</span></a>
                    </li>


                    <li>
                        <a href="orderManager.php"><i class="fa fa-edit "></i>購買記錄管理   <span class="badge">New Features</span></a></a>
                    </li>
                    <li>
                        <a href="supplierManager.php"><i class="fa fa-edit"></i>供應商管理   <span class="badge">New Features</span></a></a>   
                    </li>
					
					<li>
                        <a href="search"><i class="fa fa-search"></i>搜尋   <span class="badge">Find me!</span></a></a>   
                    </li>
					
					<li>
                        <a href="team"><i class="fa fa-users"></i>團隊組員   <span class="badge">Pretty Good</span></a></a>   
                    </li>
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>會員管理</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
				  
				  <div class="row">
                    <div class="col-lg-12 ">
					
					<!-- Create Member -->
<?php
include 'db_connection.php';
if(isset($_POST['Submit']))
{
	$name = !empty($_POST["name"]) ? mysqli_real_escape_string($conn, $_POST["name"]) : null;
	$account = !empty($_POST["account"]) ? mysqli_real_escape_string($conn, $_POST["account"]) : null;
	$password = !empty($_POST["password"]) ? mysqli_real_escape_string($conn, $_POST["password"]) : null;
	$birthday = mysqli_real_escape_string($conn, $_POST["birthday"]);
	$birthday = !empty($birthday) ? "'$birthday'" : "NULL";
	$address = !empty($_POST["address"]) ? mysqli_real_escape_string($conn, $_POST["address"]) : null;
	if($account == "")
	{?>
		<font face="verdana" color="Red">Account can't be blank, please try again.</font>
<?php	}
	else{
		$result = mysqli_query($conn, "INSERT INTO member VALUES('$account','$password','$name', $birthday, '$address')");
		if(!$result){?>
			<font face="verdana" color="Red">Failed to create member, maybe account already exist, please try again.</font>
<?php		}
		else{
			echo '<script>window.location = "success.php?type=addMember";</script>';
			//header("Location: success.php?type=addMember");
		}
	}
}else if(isset($_POST['Update']))
{
	$name = !empty($_POST["update_name"]) ? mysqli_real_escape_string($conn, $_POST["update_name"]) : null;
	$account = !empty($_POST["update_account"]) ? mysqli_real_escape_string($conn, $_POST["update_account"]) : null;
	$password = !empty($_POST["update_password"]) ? mysqli_real_escape_string($conn, $_POST["update_password"]) : null;
	$birthday = mysqli_real_escape_string($conn, $_POST['update_birthday']);
	$birthday = !empty($birthday) ? "'$birthday'" : "NULL";
	$address = !empty($_POST["update_address"]) ? mysqli_real_escape_string($conn, $_POST["update_address"]) : null;
	$id = !empty($_POST["hidden_user_account"]) ? mysqli_real_escape_string($conn, $_POST['hidden_user_account']) : "";
	if($account == "" || $id == "")
	{?>
		<font face="verdana" color="Red">Account can't be blank, please try again.</font>
<?php	}
	else{
		$result = mysqli_query($conn, "UPDATE member SET Account='$account', Password='$password', Name='$name', Birthday=$birthday, Address='$address' where Account='$id'");
		if(!$result){?>
			<font face="verdana" color="Red">Failed to update member, please try again.</font>
<?php		}
		else{
			echo '<script>window.location = "success.php?type=updateMember";</script>';
			//header("Location:success.php?type=updateMember");
		}
	}
}
?>

<!-- edit member-->

<!-- -->
            <div class="row">
			<div class="col-lg-12">
               <p>
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Create</button>
                </p>
				<div class="table-responsive">
                <table class="table">
                      <thead>
                        <tr>
                          <th>Account</th>
                          <th>Password</th>
                          <th>Name</th>
						  <th>Birthday</th>
						  <th>Address</th>
						  <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       include 'db_connection.php';
					   $result = mysqli_query($conn, "SELECT * FROM member");
                       while($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td contenteditable=\'false\'>'. $row['Account'] . '</td>';
                                echo '<td>'. $row['Password'] . '</td>';
                                echo '<td>'. $row['Name'] . '</td>';
								echo '<td>'. $row['Birthday'] . '</td>';
								echo '<td>'. $row['Address'] . '</td>';
								echo '<td><button onclick="GetUserDetails(\''.$row['Account'].'\')" class="btn btn-warning">Update</button> | <button onclick="DeleteMember(\''.$row['Account'].'\')" class="btn btn-danger">Delete</button></td>';
                                echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>
				</div>
				</div>
				</div>
        </div>
        </div>
		
    </div> <!-- /container -->
	<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">新增會員資料</h4>
</div>
<form id="member_form" name="member_form" method="post" action="">
<div class="modal-body">

<div class="form-group">
<label for="account">Account</label>
<input type="text" id="account" name="account" placeholder="Account" class="form-control" />
</div>

<div class="form-group">
<label for="password">Password</label>
<input type="text" id="password" name="password" placeholder="Password" class="form-control" />
</div>

<div class="form-group">
<label for="name">Name</label>
<input type="text" id="name" name="name" placeholder="Name" class="form-control" />
</div>

<div class="form-group">
<label for="birthday">Birthday</label>
<input type="date" id="birthday" name="birthday" placeholder="Birthday" class="form-control" />
</div>

<div class="form-group">
<label for="address">Address</label>
<input type="text" id="address" name="address" placeholder="Address" class="form-control" />
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<input type="submit" class="btn btn-primary" name="Submit" value="Create" />
</div>
</form>

			</div>
		</div>
	</div>

	
	<!-- Modal - Update User details -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">修改會員資料</h4>
            </div>
			<form id="member_editform" name="member_editform" method="post" action="">
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_account">Account</label>
                    <input type="text" id="update_account" name="update_account" placeholder="Account" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_password">Password</label>
                    <input type="text" id="update_password" name="update_password" placeholder="Password" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_name">Name</label>
                    <input type="text" id="update_name" name="update_name" placeholder="Name" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="update_birthday">Birthday</label>
                    <input type="date" id="update_birthday" name="update_birthday" placeholder="Birthday" class="form-control"/>
                </div>
				
				<div class="form-group">
                    <label for="update_address">Address</label>
                    <input type="text" id="update_address" name="update_address" placeholder="Address" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" name="Update" value="Update" />
				 <input type="hidden" id="hidden_user_account" name="hidden_user_account">
            </div>
			</form>
        </div>
    </div>
</div>
<!-- // Modal -->
                      
    </div>
        
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2049 Teamwork3 | Design by: <a href="https://www.youtube.com/watch?v=r9L4AseD-aA" style="color:#fff;" target="_blank">www.clickMeForSurprise.com</a>
                </div>
            </div>
        </div>
          
 
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
  
</body>
</html>
