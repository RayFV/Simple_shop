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
  function DeleteOrder(oid, itemid) {
    var conf = confirm("Warning!!!!!!!!!!!!!!:\nDo you really want to delete -----" + oid + "-----?");
	
    if (conf == true) {
        $.post("deleteOrder.php", {
                oid: oid,
				itemid: itemid
            }
        );
		window.location = "success.php?type=deleteOrder";
    }
  }

function GetOrderDetails(oid, itemid) {
    // Add order ID to the hidden field for furture usage
	$("#hidden_oid").val(oid);
	$("#hidden_itemid").val(itemid);
    $.post("readOrderDetails.php", {
            oid: oid,
			itemid: itemid
        },
        function (data, status) {
            // PARSE json data
            var order = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_oid").val(order.OId);
			$("#update_itemid").val(order.ItemID);
            $("#update_account").val(order.Account);
            $("#update_purchaseDate").val(order.PurchaseDate);
        }
    );
    // Open modal popup
    $("#update_order_modal").modal("show");
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
                   

                    <li >
                        <a href="memberManager.php"><i class="fa fa-edit "></i>會員管理   <span class="badge">New Features</span></a>
                    </li>
                    <li>
                        <a href="itemManager.php"><i class="fa fa-edit "></i>產品管理   <span class="badge">New Features</span></a>
                    </li>


                    <li class="active-link">
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
                     <h2>購買記錄管理</h2>   
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
	$orderid = !empty($_POST["orderid"]) ? mysqli_real_escape_string($conn, $_POST["orderid"]) : null;
	$itemid = !empty($_POST["itemid"]) ? mysqli_real_escape_string($conn, $_POST["itemid"]) : null;
	$account = !empty($_POST["account"]) ? mysqli_real_escape_string($conn, $_POST["account"]) : null;
	$purchaseDate = mysqli_real_escape_string($conn, $_POST["purchaseDate"]);
	$purchaseDate = !empty($purchaseDate) ? "'$purchaseDate'" : "NULL";
	if($orderid == "")
	{?>
		<font face="verdana" color="Red">OrderID can't be blank, please try again.</font>
<?php	}
	else{
		$result = mysqli_query($conn, "select count(*) as count from orderhistory where OId='$orderid'");
		$row = mysqli_fetch_assoc($result);
		$sql = "";
		if($row['count'] == 0){
			$sql .= "INSERT INTO orderhistory VALUES('$orderid','$account', $purchaseDate);";
		}
		$sql .= "INSERT INTO odetail VALUES('$orderid','$itemid')";
		$result = mysqli_multi_query($conn, $sql);
		if(!$result){?>
			<font face="verdana" color="Red">Failed to create Order, maybe Same Order already exist, please try again.</font>
<?php		}
		else{
			echo '<script>window.location = "success.php?type=addOrder";</script>';
			//header("Location: success.php?type=addMember");
		}
	}
}else if(isset($_POST['Update']))
{
	$oid = !empty($_POST["update_oid"]) ? mysqli_real_escape_string($conn, $_POST["update_oid"]) : null;
	$account = !empty($_POST["update_account"]) ? mysqli_real_escape_string($conn, $_POST["update_account"]) : null;
	$itemid = !empty($_POST["update_itemid"]) ? mysqli_real_escape_string($conn, $_POST["update_itemid"]) : null;
	$purchaseDate = mysqli_real_escape_string($conn, $_POST['update_purchaseDate']);
	$purchaseDate = !empty($purchaseDate) ? "'$purchaseDate'" : "NULL";
	$id = !empty($_POST["hidden_oid"]) ? mysqli_real_escape_string($conn, $_POST['hidden_oid']) : "";
	$iid = !empty($_POST["hidden_itemid"]) ? mysqli_real_escape_string($conn, $_POST['hidden_itemid']) : "";
	if($oid == "" || $id == "" || $itemid=="")
	{?>
		<font face="verdana" color="Red">Order ID And ItemID can't be blank, please try again.</font>
<?php	}
	else{
		$result = mysqli_multi_query($conn, "UPDATE orderhistory SET OId='$oid', Account='$account', PurchaseDate=$purchaseDate where OId='$id';UPDATE odetail SET ItemID='$itemid' where OId='$oid' and ItemID='$iid'");
		if(!$result){?>
			<font face="verdana" color="Red">Failed to update order, please try again.</font>
<?php		}
		else{
			//$result = mysqli_query($conn, "UPDATE odetail SET ItemID='$itemid' where OId='$oid'");
			//if($result){
				echo '<script>window.location = "success.php?type=updateOrder";</script>';
			//}else=
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
                          <th>Order ID</th>
                          <th>Item ID</th>
                          <th>Item Name</th>
						  <th>Account</th>
						  <th>Name</th>
						  <th>Purchase Date</th>
						  <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       include 'db_connection.php';
					   $sql = "select * from orderhistory as oh left join member as m on oh.Account = m.Account left join odetail as o on oh.OId = o.OId left join iteminfo as i on o.ItemID = i.ItemID";
					   $result = mysqli_query($conn, $sql);
					   //"SELECT * FROM orderhistory as oh , odetail as o, iteminfo as i, member as m where oh.OId = o.OId and oh.Account = m.Account and o.ItemID = i.ItemID"
                       while($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td contenteditable=\'false\'>'. $row['OId'] . '</td>';
                                echo '<td>'. $row['ItemID'] . '</td>';
                                echo '<td>'. $row['ItemName'] . '</td>';
								echo '<td>'. $row['Account'] . '</td>';
								echo '<td>'. $row['Name'] . '</td>';
								echo '<td>'. $row['PurchaseDate'] . '</td>';
					   echo '<td><button onclick="GetOrderDetails(\''.$row['OId'].'\', \''.$row['ItemID'].'\')" class="btn btn-warning">Update</button> | <button onclick="DeleteOrder(\''.$row['OId'].'\', \''.$row['ItemID'].'\')" class="btn btn-danger">Delete</button></td>';
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
<h4 class="modal-title" id="myModalLabel">新增購買記錄</h4>
</div>
<form id="member_form" name="member_form" method="post" action="">
<div class="modal-body">

<div class="form-group">
<label for="orderid">Order ID</label>
<input type="text" id="orderid" name="orderid" placeholder="Order ID" class="form-control" />
</div>

<div class="form-group">
<label for="name">ItemID -- ItemName </label> <p>
<select name="itemid">
					<?php
					   $result = mysqli_query($conn, "select ItemID, ItemName from iteminfo");
						$list = array();
						while($row = mysqli_fetch_array($result)) {
                                $list[$row['ItemID']] = $row['ItemName'];
								$last = $row['ItemID']; 
                       }
						foreach($list as $key =>$value){
							?><option value="<?php echo $key; ?>"<?php
								if($value==$last)echo ' selected="selected"';
							?>><?php echo $key . " -- " . $value; ?></option><?php
						}
					?>
				</select>
</div>

<div class="form-group">
<label for="name">Account -- Name    <font face="verdana" color="Blue" size="1">[If your Order ID is exist, you can skip this part.]</font></label> <p>
<select name="account">
					<?php
					   $result = mysqli_query($conn, "select Account, Name from member");
						$list = array();
						while($row = mysqli_fetch_array($result)) {
                                $list[$row['Account']] = $row['Name'];
								$last = $row['Account']; 
                       }
						foreach($list as $key =>$value){
							?><option value="<?php echo $key; ?>"<?php
								if($value==$last)echo ' selected="selected"';
							?>><?php echo $key . " -- " . $value; ?></option><?php
						}
					?>
				</select>
</div>

<div class="form-group">
<label for="purchaseDate">Purchase Date</label>
<input type="date" id="purchaseDate" name="purchaseDate" placeholder="Purchase Date" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
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

	
	<!-- Modal - Update order details -->
<div class="modal fade" id="update_order_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">修改購買記錄</h4>
            </div>
			<form id="member_editform" name="member_editform" method="post" action="">
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_oid">Order ID</label>
                    <input type="text" id="update_oid" name="update_oid" placeholder="Order ID" class="form-control"/>
                </div>

                <div class="form-group">
				<label for="name">ItemID -- ItemName </label> <p>
				<select name="update_itemid" id="update_itemid">
									<?php
									   $result = mysqli_query($conn, "select ItemID, ItemName from iteminfo");
										$list = array();
										while($row = mysqli_fetch_array($result)) {
												$list[$row['ItemID']] = $row['ItemName'];
									   }
										foreach($list as $key =>$value){
											?><option value="<?php echo $key; ?>">
											<?php echo $key . " -- " . $value; ?></option><?php
										}
									?>
								</select>
				</div>
				
				<div class="form-group">
				<label for="name">Account -- Name </label> <p>
				<select name="update_account" id="update_account">
									<?php
									   $result = mysqli_query($conn, "select Account, Name from member");
										$list = array();
										while($row = mysqli_fetch_array($result)) {
												$list[$row['Account']] = $row['Name'];
									   }
										foreach($list as $key =>$value){
											?><option value="<?php echo $key; ?>">
											<?php echo $key . " -- " . $value; ?></option><?php
										}
									?>
								</select>
				</div>
				
				<div class="form-group">
                    <label for="update_purchaseDate">Purchase Date</label>
                    <input type="date" id="update_purchaseDate" name="update_purchaseDate" placeholder="Purchase Date" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" name="Update" value="Update" />
				 <input type="hidden" id="hidden_oid" name="hidden_oid">
				 <input type="hidden" id="hidden_itemid" name="hidden_itemid">
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
