<?php
  session_start();
  
  if(!$_SESSION['user_id']){
       header('Location:index.php');
   }
   
    if(isset($_GET['search'])){
	    $search_text = $_GET['search'];
		
		if(!empty($search_text)){
		     header('Location:home.php?like='.$search_text);
		
		}
	
	}
?>
<html>
	<head>
		<link href="css/bootstrap.css" rel="stylesheet" />
		<link href="css/template.css" rel="stylesheet" />

	</head>

	<body>
		<div id="header">

			<div style="display:inline;">
			<h1 id="head" style="">E-Selling</h1></div>

			<div id="search_id">
				<form method="GET" action="template.php">
					<input type="text" id="tfq" class="tftextinput2" name="search" size="21" maxlength="120" value="Search our website">
					<input type="submit" value="Search" class="tfbutton2">
				</form>
			</div>
			
            <div id="welcome_id"></div>
			<div class="btn-group" id="user_dropdown">
				  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="width:100px;" id="username">
				    <?php echo $_SESSION['username'] ?> <span class="caret"></span>
				  </button>
				  <ul class="dropdown-menu" role="menu">
				    <li><a href="home.php">Home</a></li>
				    <li><a href="editprofile.php">Edit Profile</a></li>
				    <li><a href="remove_ad.php">Remove Ads</a></li>
				    <li class="divider"></li>
				    <li><a href="logout.php">Logout</a></li>
				  </ul>
			</div>

			


		</div>

		<div id="category_id" class="col-md-10 col-md-offset-1" >
    			<ul class="nav nav-pills">
			      <li class="active"><a href="#" style="color:white;">Select Category</a></li>
			      <li class="dropdown">
			        <a id="cat_mobile" role="button" data-toggle="dropdown" href="#">Mobiles & Tablets <span class="caret"></span></a>
				        <ul id="sub_mobile_ul" class="dropdown-menu" role="menu" aria-labelledby="drop4">
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=1">Mobile Phones</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=2">Tablets</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=3">Accessories</a></li>
				        </ul>
			      </li>
			      <li class="dropdown">
			        <a id="cat_mobile" role="button" data-toggle="dropdown" href="#">Electronics & Computers <span class="caret"></span></a>
				        <ul id="sub_mobile_ul" class="dropdown-menu" role="menu" aria-labelledby="drop4">
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=4">Camera & Accessories</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=5">Laptop</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=6">Laptop-Accessories</a></li>
				        </ul>
			      </li>
			      <li class="dropdown">
			        <a id="cat_mobile" role="button" data-toggle="dropdown" href="#">Vehicles <span class="caret"></span></a>
				        <ul id="sub_mobile_ul" class="dropdown-menu" role="menu" aria-labelledby="drop4">
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=7">Cars</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=8">Bikes</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=9">Scooters</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=10">Spare-Parts</a></li>
				        </ul>
			      </li>
			      <li class="dropdown">
			        <a id="cat_mobile" role="button" data-toggle="dropdown" href="#">Home & Furniture <span class="caret"></span></a>
				        <ul id="sub_mobile_ul" class="dropdown-menu" role="menu" aria-labelledby="drop4">
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=11">Furniture</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=12">Refrigerator</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=13">Washing Machine</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=14">Kitchen-Appliances</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=15" >Other Households</a></li>
				        </ul>
			      </li>
			      <li class="dropdown">
			        <a id="cat_mobile" role="button" data-toggle="dropdown" href="#" >Books, CD's<span class="caret"></span></a>
				        <ul id="sub_mobile_ul" class="dropdown-menu" role="menu" aria-labelledby="drop4">
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=16">Books & Magazines</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=17">CD-DVD</a></li>
				        </ul>
			      </li>
			      <li class="dropdown">
			        <a id="cat_mobile" role="button" data-toggle="dropdown" href="#">Sports & Health <span class="caret"></span></a>
				        <ul id="sub_mobile_ul" class="dropdown-menu" role="menu" aria-labelledby="drop4">
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=18">Sport Equipment</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=19">Gym & Fitness</a></li>
				          <li role="presentation"><a role="menuitem" tabindex="-1" href="home.php?subcategory=20">Health & Beauty</a></li>
				        </ul>
			      </li>
			    </ul> 
			</div>


		<div id="freeaddiv">
			 <a href="post_ad.php"><input type="button"  value="Post Free Ad" class="btn btn-warning" id="freead"/>  </a>
		</div>

		<div id="alert">
			<a href="alert.php"><input type="button" value="Subscribe for free Alerts" class="btn btn-success" id="subscribe"/>  </a>
		</div>

</div>

		


		<!-- javascript files include -->
		<script type="text/javascript"  src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/dropdown.js"></script>
		<script type="text/javascript">
	
			window.onload = function(){ 
				//Get submit button
				var submitbutton = document.getElementById("tfq");
				//Add listener to submit button
				if(submitbutton.addEventListener){
					submitbutton.addEventListener("click", function() {
						if (submitbutton.value == 'Search our website'){
							submitbutton.value = '';
						}
					});
				}
			}			
		</script>

	</body>

</html>

