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
  function DeleteSupplier(sid) {
    var conf = confirm("Warning!!!!!!!!!!!!!!:\nDo you really want to delete -----" + sid + "-----?");
	
    if (conf == true) {
        $.post("deleteSupplier.php", {
                sid: sid
            }
        );
		window.location = "success.php?type=deleteSupplier";
    }
  }

function GetSupplierDetails(sid) {
    // Add User ID to the hidden field for furture usage
	$("#hidden_sid").val(sid);
    $.post("readSupplierDetails.php", {
            sid: sid
        },
        function (data, status) {
            // PARSE json data
            var supplier = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_sid").val(supplier.SId);
            $("#update_sname").val(supplier.SName);
            $("#update_stel").val(supplier.STel);
        }
    );
    // Open modal popup
    $("#update_supplier_modal").modal("show");
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
                   

                    <li>
                        <a href="memberManager.php"><i class="fa fa-edit "></i>會員管理   <span class="badge">New Features</span></a>
                    </li>
                    <li>
                        <a href="itemManager.php"><i class="fa fa-edit "></i>產品管理   <span class="badge">New Features</span></a>
                    </li>


                    <li>
                        <a href="orderManager.php"><i class="fa fa-edit "></i>購買記錄管理   <span class="badge">New Features</span></a></a>
                    </li>
                    <li class="active-link">
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
                     <h2>供應商管理</h2>   
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
	$sid = !empty($_POST["sid"]) ? mysqli_real_escape_string($conn, $_POST["sid"]) : null;
	$sname = !empty($_POST["sname"]) ? mysqli_real_escape_string($conn, $_POST["sname"]) : null;
	$stel = !empty($_POST["stel"]) ? mysqli_real_escape_string($conn, $_POST["stel"]) : null;
	if($sid == "")
	{?>
		<font face="verdana" color="Red">Supplier ID can't be blank, please try again.</font>
<?php	}
	else{
		$result = mysqli_query($conn, "INSERT INTO supplier VALUES('$sid','$sname','$stel')");
		if(!$result){?>
			<font face="verdana" color="Red">Failed to create member, maybe account already exist, please try again.</font>
<?php		}
		else{
			echo '<script>window.location = "success.php?type=addSupplier";</script>';
		}
	}
}else if(isset($_POST['Update']))
{
	$sid = !empty($_POST["update_sid"]) ? mysqli_real_escape_string($conn, $_POST["update_sid"]) : null;
	$sname = !empty($_POST["update_sname"]) ? mysqli_real_escape_string($conn, $_POST["update_sname"]) : null;
	$stel = !empty($_POST["update_stel"]) ? mysqli_real_escape_string($conn, $_POST["update_stel"]) : null;
	$id = !empty($_POST["hidden_sid"]) ? mysqli_real_escape_string($conn, $_POST['hidden_sid']) : "";
	if($sid == "" || $id == "")
	{?>
		<font face="verdana" color="Red">Supplier ID can't be blank, please try again.</font>
<?php	}
	else{
		$result = mysqli_query($conn, "UPDATE supplier SET SId='$sid', SName='$sname', STel='$stel' where SId='$id'");
		if(!$result){?>
			<font face="verdana" color="Red">Failed to update supplier, please try again.</font>
<?php		}
		else{
			echo '<script>window.location = "success.php?type=updateSupplier";</script>';
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
                          <th>Supplier ID</th>
                          <th>Supplier Name</th>
                          <th>Supplier Tel</th>
						  <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       include 'db_connection.php';
					   $result = mysqli_query($conn, "SELECT * FROM supplier");
                       while($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td contenteditable=\'false\'>'. $row['SId'] . '</td>';
                                echo '<td>'. $row['SName'] . '</td>';
                                echo '<td>'. $row['STel'] . '</td>';
								echo '<td><button onclick="GetSupplierDetails(\''.$row['SId'].'\')" class="btn btn-warning">Update</button> | <button onclick="DeleteSupplier(\''.$row['SId'].'\')" class="btn btn-danger">Delete</button></td>';
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
<h4 class="modal-title" id="myModalLabel">新增供應商資料</h4>
</div>
<form id="member_form" name="member_form" method="post" action="">
<div class="modal-body">

<div class="form-group">
<label for="sid">Supplier ID</label>
<input type="text" id="sid" name="sid" placeholder="Supplier ID" class="form-control" />
</div>

<div class="form-group">
<label for="sname">Supplier Name</label>
<input type="text" id="sname" name="sname" placeholder="Supplier Name" class="form-control" />
</div>

<div class="form-group">
<label for="stel">Supplier Tel</label>
<input type="text" id="stel" name="stel" placeholder="Supplier Tel" class="form-control" />
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
<div class="modal fade" id="update_supplier_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">修改供應商資料</h4>
            </div>
			<form id="member_editform" name="member_editform" method="post" action="">
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_account">Supplier ID</label>
                    <input type="text" id="update_sid" name="update_sid" placeholder="Supplier ID" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_password">Supplier Name</label>
                    <input type="text" id="update_sname" name="update_sname" placeholder="Supplier Name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_name">Supplier Tel</label>
                    <input type="text" id="update_stel" name="update_stel" placeholder="Supplier Tel" class="form-control"/>
                </div>
				
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" name="Update" value="Update" />
				 <input type="hidden" id="hidden_sid" name="hidden_sid">
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
