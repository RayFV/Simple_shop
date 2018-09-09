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
                 


                    <li class="active-link">
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
                     <h2>管理系統</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome ! </strong> This is Our Teamwork 3.
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="memberManager.php" >
 <i class="fa fa-pencil-square-o fa-5x"></i>
                      <h4>會員管理</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="itemManager.php" >
 <i class="fa fa-pencil-square-o fa-5x"></i>
                      <h4>產品管理</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="orderManager.php" >
 <i class="fa fa-pencil-square-o fa-5x"></i>
                      <h4>購買記錄管理</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="supplierManager.php" >
 <i class="fa fa-pencil-square-o fa-5x"></i>
                      <h4>供應商管理</h4>
                      </a>
                      </div>
                     
				</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="search.php" >
 <i class="fa fa-search fa-5x"></i>
                      <h4>搜尋</h4>
                      </a>
                      </div>
					  </div>
                     
                 <!-- /. ROW  -->   
				  <div class="row">
                    <div class="col-lg-12 ">
					<br/>
                       
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
