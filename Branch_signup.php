<?php
include("connection.php");
?>
<html>
<head>
<?php
include("script.php");
?>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <a class="navbar-brand" href="http://iiitu.ac.in/">
    <a class="navbar-brand page-scroll" href="#page-top"><img src="image/Capture_7.png" style="width:110px;" class="img-responsive" alt=""></a>
  </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>EXIT</a></li>
      </ul>
    </div>
  </div>
</nav>
<?php
echo"<br><br><br>
<div class='container-fluid'>
<div class='row'>
<div class='col-md-12'>
<div class='panel panel-primary min_h'>
<div class=well well-sm><h3><strong>VOTER SIGNUP-STEP I</strong></h3></div>	
<div class=row><div class='col-md-1'></div>";
echo"<div class='col-md-11'>";?>
<?php

$rollf ="";
$rollfErr = "";
$rollfErr1 = 0;
$len=0;

if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
	  if (empty($_POST["branch4"]) && ($_POST["year4"])) {
		$rollfErr = "Roll no. is required";
		$rollfErr1=1;
		}
		else
		{
				$branch_rec=$_POST["branch4"];
			$year_rec=$_POST["year4"];
			echo "<br>";
			$sec_key=0;
			$pri_key=0;
			if($branch_rec=="Electronics & Communication")
			{
				if($year_rec=="First")
					$orig_key="IIITU192";
				if($year_rec=="Second")
					$orig_key="IIITU182";
				if($year_rec=="Third")
					$orig_key="IIITU172";
				if($year_rec=="Final")
					$orig_key="IIITU162";
			}
			if($branch_rec=="Computer Science")
					{
				if($year_rec=="First")
					$orig_key="IIITU191";
				if($year_rec=="Second")
					$orig_key="IIITU181";
				if($year_rec=="Third")
					$orig_key="IIITU171";
				if($year_rec=="Final")
					$orig_key="IIITU161";
			}
			if($branch_rec=="Information Technology")
					{
				if($year_rec=="First")
					$orig_key="IIITU193";
				if($year_rec=="Second")
					$orig_key="IIITU183";
				if($year_rec=="Third")
					$orig_key="IIITU173";
				if($year_rec=="Final")
					$orig_key="IIITU163";
			}
	}
		if($rollfErr1==1)
		{
			echo"Error in formats";
		}
		else
		{
			$anuk=$orig_key;
			header("Location: Voters_signup.php?rollf=$anuk");
		}
}
  
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
  <form method='post' enctype='multipart/form-data' action='<?php $_SERVER['PHP_SELF']?>'>
 <h2><strong>Choose Branch and Year</strong></h2><?php echo ""?>
  Branch:
 <select name="branch4">
   <option name="ece4">Electronics & Communication</option>
  <option name="cse4">Computer Science</option>
  <option name="it4">Information Technology</option>
</select>
 Year:  
 <select name="year4">
  <option name="first4">First</option>
  <option name="second4">Second</option>
  <option name="third4">Third</option>
  <option name="fourth4">Final</option>
  </select>
  <span class="error"> <?php echo $rollfErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="NEXT">  
   </form>
<?php
echo"<br><br><br><br></div>
</div>
</div>
</div>
</div>";
echo "</div>";
?>

</div>
<?php
include("footer_2.php");  ?>
</body>
</html>