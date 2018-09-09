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
                    <li>
                        <a href="itemManager.php"><i class="fa fa-edit "></i>產品管理   <span class="badge">New Features</span></a>
                    </li>


                    <li>
                        <a href="orderManager.php"><i class="fa fa-edit "></i>購買記錄管理   <span class="badge">New Features</span></a></a>
                    </li>
                    <li>
                        <a href="supplierManager.php"><i class="fa fa-edit"></i>供應商管理   <span class="badge">New Features</span></a></a>   
                    </li>
					
					<li class="active-link">
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
                     <h2>搜尋</h2>   
                    </div>
                </div>          

				
                 <!-- /. ROW  -->
                  <hr />
				  <form name="search_form" method="post" action=''>
				<select name="searchSelect1" onchange="window.location='search.php?table='+this.value">
					<?php
					echo "<option selected disabled>Choose here</option>";
					$choosen = "";
					if (isset($_GET['table'])) {
						$choosen = $_GET['table'];
					}
						foreach(array(
							'Member' => 'member',
							'Item' => 'iteminfo',
							'OrderHistory' => 'orderhistory',
							'Supplier' => 'supplier'
						) as $key => $value){
							?><option value="<?php echo $value; ?>"<?php
								if($value==$choosen)echo ' selected="selected"';
							?>><?php echo $key; ?></option><?php
						}
					?>
				</select>
				<select name="searchSelect2">
					<?php
						$table = $_GET['table'];
						include 'db_connection.php';
					    $result = mysqli_query($conn, "Show columns FROM $table");
						$list = array();
						while($row = mysqli_fetch_array($result)) {
                                $list[] = $row['Field'];
                       }
						foreach($list as $value){
							?><option value="<?php echo $value; ?>">
							<?php echo $value; ?></option><?php
						}
					?>
				</select>
								
				<input type="text" name="searchText" placeholder="Enter Text">
				<input type="submit" name="Search" value="search">
</form>
                
                     
                 <!-- /. ROW  -->   
				  <div class="row">
                    <div class="col-lg-12 ">
					<br/>
                       <?php
if(isset($_POST['Search']))
{
include 'db_connection.php';
	$table = !empty($_POST["searchSelect1"]) ? mysqli_real_escape_string($conn, $_POST["searchSelect1"]) : null;
	$attribute = !empty($_POST["searchSelect2"]) ? mysqli_real_escape_string($conn, $_POST["searchSelect2"]) : null;
	$input = !empty($_POST["searchText"]) ? mysqli_real_escape_string($conn, $_POST["searchText"]) : null;
	if($table != "" && $attribute != "")
	{
		if($table == 'member'){
			?>
			<div class="table-responsive">
			<table class="table">
				  <thead>
					<tr>
					  <th>Account</th>
					  <th>Password</th>
					  <th>Name</th>
					  <th>Birthday</th>
					  <th>Address</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php
				   //"select * from $table where $attribute='%$input%'"
				   $result = mysqli_query($conn, "SELECT * FROM member where $attribute like '%$input%'");
				   while($row = mysqli_fetch_array($result)) {
						echo '<tr>';
						echo '<td>'. $row['Account'] . '</td>';
						echo '<td>'. $row['Password'] . '</td>';
						echo '<td>'. $row['Name'] . '</td>';
						echo '<td>'. $row['Birthday'] . '</td>';
						echo '<td>'. $row['Address'] . '</td>';
						echo '</tr>';
				   }
				  ?>
				  </tbody>
			</table>
			</div>
				<?php
				
			}else if($table == 'iteminfo'){
				?>
				<div class="table-responsive">
                <table class="table">
                      <thead>
                        <tr>
                          <th>Item ID</th>
                          <th>Item Name</th>
                          <th>Supplier Name</th>
						  <th>Supplier ID</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                       //include 'db_connection.php';
					   $result = mysqli_query($conn, "select ItemID, ItemName, SName, supplier.SId from iteminfo left join supplier on iteminfo.SId = supplier.SId where iteminfo.$attribute like '%$input%'");
                       while($row = mysqli_fetch_array($result)) {
							echo '<tr>';
							echo '<td contenteditable=\'false\'>'. $row['ItemID'] . '</td>';
							echo '<td>'. $row['ItemName'] . '</td>';
							echo '<td>'. $row['SName'] . '</td>';
							echo '<td>'. $row['SId'] . '</td>';
							echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>
				</div>
				<?php
			}else if($table == 'orderhistory'){
				?>
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
                        </tr>
                      </thead>
                      <tbody>
                      <?php
					   $sql = "select * from orderhistory as oh left join member as m on oh.Account = m.Account left join odetail as o on oh.OId = o.OId left join iteminfo as i on o.ItemID = i.ItemID where oh.$attribute like '%$input%'";
					   $result = mysqli_query($conn, $sql);
                       while($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td contenteditable=\'false\'>'. $row['OId'] . '</td>';
                                echo '<td>'. $row['ItemID'] . '</td>';
                                echo '<td>'. $row['ItemName'] . '</td>';
								echo '<td>'. $row['Account'] . '</td>';
								echo '<td>'. $row['Name'] . '</td>';
								echo '<td>'. $row['PurchaseDate'] . '</td>';
								echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>
				</div>
				<?php
			}else if($table == 'supplier'){
				?>
				<div class="table-responsive">
                <table class="table">
                      <thead>
                        <tr>
                          <th>Supplier ID</th>
                          <th>Supplier Name</th>
                          <th>Supplier Tel</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
					   $result = mysqli_query($conn, "SELECT * FROM supplier where $attribute like '%$input%'");
                       while($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td contenteditable=\'false\'>'. $row['SId'] . '</td>';
                                echo '<td>'. $row['SName'] . '</td>';
                                echo '<td>'. $row['STel'] . '</td>';
								echo '</tr>';
                       }
                      ?>
                      </tbody>
                </table>
				</div>
				<?php
			}
		}
}?>
                    </div>
                    </div>
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
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
