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
  function DeleteItem(itemid) {
    var conf = confirm("Warning!!!!!!!!!!!!!!:\nDo you really want to delete -----" + itemid + "-----?");
	
    if (conf == true) {
        $.post("deleteItem.php", {
                itemid: itemid
            }
        ,
        function (response) {
            // PARSE json data
            //var res = JSON.parse(response);
            // Assing existing values to the modal popup fields
            if(response){
				window.location = "success.php?type=failDeleteItem";
			}
			else{
				window.location = "success.php?type=deleteItem";
			}
        }
		);
    }
  }

function GetItemDetails(itemid) {
    // Add User ID to the hidden field for furture usage
	$("#hidden_itemid").val(itemid);
    $.post("readItemDetails.php", {
            itemid: itemid
        },
        function (data, status) {
            // PARSE json data
            var item = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_itemid").val(item.ItemID);
            $("#update_itemName").val(item.ItemName);
            $("#supplierSelect").val(item.SId);
        }
    );
    // Open modal popup
    $("#update_item_modal").modal("show");
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
                 


                    <li>
                        <a href="index.php" ><i class="fa fa-desktop "></i>Home</a>
                    </li>
                   

                    <li>
                        <a href="memberManager.php"><i class="fa fa-edit "></i>會員管理   <span class="badge">New Features</span></a>
                    </li>
                    <li  class="active-link">
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
                     <h2>產品管理</h2>   
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
	$itemid = !empty($_POST["itemid"]) ? mysqli_real_escape_string($conn, $_POST["itemid"]) : null;
	$itemName = !empty($_POST["itemName"]) ? mysqli_real_escape_string($conn, $_POST["itemName"]) : null;
	$sid = !empty($_POST["supplierSelect"]) ? mysqli_real_escape_string($conn, $_POST["supplierSelect"]) : null;
	if($itemid == "")
	{?>
		<font face="verdana" color="Red">Item ID can't be blank, please try again.</font>
<?php	}
	else{
		$result = mysqli_query($conn, "INSERT INTO iteminfo VALUES('$itemid','$itemName','$sid')");
		if(!$result){?>
			<font face="verdana" color="Red">Failed to Add Item, maybe Item ID already exist, please try again.</font>
<?php		}
		else{
			echo '<script>window.location = "success.php?type=addItem";</script>';
			//header("Location: success.php?type=addMember");
		}
	}
}else if(isset($_POST['Update']))
{
	$itemid = !empty($_POST["update_itemid"]) ? mysqli_real_escape_string($conn, $_POST["update_itemid"]) : null;
	$itemName = !empty($_POST["update_itemName"]) ? mysqli_real_escape_string($conn, $_POST["update_itemName"]) : null;
	$sid = !empty($_POST["supplierSelect"]) ? mysqli_real_escape_string($conn, $_POST["supplierSelect"]) : null;
	$id = !empty($_POST["hidden_itemid"]) ? mysqli_real_escape_string($conn, $_POST['hidden_itemid']) : "";
	if($itemid == "" || $id == "")
	{?>
		<font face="verdana" color="Red">Item ID can't be blank, please try again.</font>
<?php	}
	else{
		$result = mysqli_query($conn, "UPDATE iteminfo SET ItemID='$itemid', ItemName='$itemName', SId='$sid' where ItemID='$id'");
		if(!$result){?>
			<font face="verdana" color="Red">Failed to update item, please try again.</font>
<?php		}
		else{
			echo '<script>window.location = "success.php?type=updateItem";</script>';
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
                          <th>Item ID</th>
                          <th>Item Name</th>
                          <th>Supplier Name</th>
						  <th>Supplier ID</th>
						  <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       //include 'db_connection.php';
					   $result = mysqli_query($conn, "select ItemID, ItemName, SName, supplier.SId from iteminfo left join supplier on iteminfo.SId = supplier.SId");
                       while($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td contenteditable=\'false\'>'. $row['ItemID'] . '</td>';
                                echo '<td>'. $row['ItemName'] . '</td>';
                                echo '<td>'. $row['SName'] . '</td>';
								echo '<td>'. $row['SId'] . '</td>';
								echo '<td><button onclick="GetItemDetails(\''.$row['ItemID'].'\')" class="btn btn-warning">Update</button> | <button onclick="DeleteItem(\''.$row['ItemID'].'\')" class="btn btn-danger">Delete</button></td>';
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
<h4 class="modal-title" id="myModalLabel">新增產品資料</h4>
</div>
<form id="member_form" name="member_form" method="post" action="">
<div class="modal-body">

<div class="form-group">
<label for="itemid">Item ID</label>
<input type="text" id="itemid" name="itemid" placeholder="Item ID" class="form-control" />
</div>

<div class="form-group">
<label for="itemName">Item Name</label>
<input type="text" id="itemName" name="itemName" placeholder="Item Name" class="form-control" />
</div>

<div class="form-group">
<label for="name">Supplier </label> <p>
<select name="supplierSelect">
					<?php
					   $result = mysqli_query($conn, "select SId, SName from supplier");
						$list = array();
						while($row = mysqli_fetch_array($result)) {
                                $list[$row['SId']] = $row['SName'];
								$last = $row['SId']; 
                       }
						foreach($list as $key =>$value){
							?><option value="<?php echo $key; ?>"<?php
								if($value==$last)echo ' selected="selected"';
							?>><?php echo $value; ?></option><?php
						}
					?>
				</select>
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
<div class="modal fade" id="update_item_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">修改產品資料</h4>
            </div>
			<form id="member_editform" name="member_editform" method="post" action="">
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_itemid">Item ID</label>
                    <input type="text" id="update_itemid" name="update_itemid" placeholder="ItemID" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_itemName">Item Name</label>
                    <input type="text" id="update_itemName" name="update_itemName" placeholder="Item Name" class="form-control"/>
                </div>

                <div class="form-group">
				<label for="name">Supplier </label> <p>
				<select name="supplierSelect" id="supplierSelect">
									<?php
									   $result = mysqli_query($conn, "select SId, SName from supplier");
										$list = array();
										while($row = mysqli_fetch_array($result)) {
												$list[$row['SId']] = $row['SName'];
									   }
										foreach($list as $key =>$value){
											?><option value="<?php echo $key; ?>">
											<?php echo $value; ?>
											</option><?php
										}
									?>
								</select>
				</div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" name="Update" value="Update" />
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
