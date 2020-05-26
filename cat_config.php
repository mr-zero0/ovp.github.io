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
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>LOGOUT</a></li>
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
<div class=well well-sm><h3><strong>CONFIGURE ELECTIONS</strong></h3></div>	
<div class=row><div class='col-md-1'></div>";
echo"<div class='col-md-11'>";?>
<?php

$catname = $rollf = $max_votes ="";
$catnameErr = $rollfErr =  $maxErr ="";
$catnameErr1 =  $rollfErr1 = $maxErr1 = 0;
$len=0;

if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
  if (empty($_POST["catname"])) {
    $catnameErr = "Name is required";
	$catnameErr1=1;
  } else {
    $catname = test_input($_POST["catname"]);
    /*check if name only contains letters and whitespace
    if (!preg_match("/^[a-z_A-Z ]*$/",$catname)) {
      $catnameErr = "Only letters and white space allowed"; 
	  $catnameErr1=1;
    }*/
  }
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
		
	if (empty($_POST["max_votes"]))
	{
    $maxErr = "Enter no. of voters";
	$maxErr1=1;
    }
	else
	{
		$max_votes=$_POST["max_votes"];
	}	
	
		if($catnameErr1==1 || $rollfErr1==1 || $maxErr1==1)
		{
			echo"Error in formats";
		}
	else
	{
		$naam1=$_POST["catname"];
		$anuk=$orig_key;
		$no_votes=$_POST["max_votes"];
		$sql="insert into catinfo(Catname,Rollf,Max_votes) values('$naam1','$anuk','$no_votes')";
	$query=mysqli_query($con,$sql);
	if($query)
	{
				echo "<p style='visibility:hidden'>saved</p>";?>
				<script language='javascript' type='text/javascript'> location.href='addel.php' </script><?php
				
				$sql1="create database $naam1";
	$query1=mysqli_query($con,$sql1);
	if($query1)
	{   
		mysqli_connect($server,$userid,$password,$naam);
		mysqli_select_db($con,$naam);
		$conn="create table $naam1.cand_signup (id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,candname varchar(20),candroll varchar(10) NOT NULL,candmob varchar(10) NOT NULL,candvote varchar(4),UNIQUE (candroll,candmob))" ;
		$conn2="create table $naam1.voter_login (id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,candname varchar(20),candroll varchar(10)NOT NULL,candmob varchar(10) NOT NULL,UNIQUE (candroll,candmob))" ;
		if(mysqli_query($con,$conn) && mysqli_query($con,$conn2))
		{
			echo"created";
		}
		else
		{
			echo "error" . mysqli_error($con);
		}
	}
	else
	{
		echo "<div class=row><div class='col-md-1'></div>
			<div class='col-md-11'>error<br/>$sql</div></div>";
	}
	}
	
	}
}
  
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

  <form method='post' action='cat_config.php' enctype='multipart/form-data'>
		<h2><strong>Category Name</strong></h2><?php echo ""?><input type="text" id="catname" name="catname" placeholder="CR_BRANCH" value="<?php echo $catname;?>">
  <span class="error"> <?php echo $catnameErr;?></span><br>
  <h2><strong>Maximum Votes</strong></h2><?php echo ""?><input type="text" id="max_votes" name="max_votes" value="<?php echo $max_votes?>">
  <span class="error"> <?php echo $maxErr;?></span>
  <br>
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
  <input type="submit" name="submit" value="Submit">  
   </form>
<?php
echo"</div>
</div>
</div>
</div>
</div>
";
echo "</div>";
?>
</div>
<?php
include("footer_2.php");  ?>
</body>
</html>