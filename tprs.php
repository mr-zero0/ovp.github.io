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
<div class='container-fluid'><div class='row'>
<div class='col-md-12'>
<div class='panel panel-primary min_h'>
<div class=well well-sm><h3><strong>CONFIGURE ELECTIONS</strong></h3></div>	
<div class=row><div class='col-md-1'></div>";
echo"<div class='col-md-11'>";?>
<?php

$catname = $rollf = $max_votes = $max_cand = $vmale = $vfemale = "";
$catnameErr = $rollfErr =  $maxErr = $maxcErr = $vmaleErr = $vfemaleErr = "";
$catnameErr1 =  $rollfErr1 = $maxErr1 = $maxcErr1 = $vmaleErr1 = $vfemaleErr1 = 0;
$len=0;

if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
  if (empty($_POST["catname"])) {
    $catnameErr = "Name is required";
	$catnameErr1=1;
  } else {
    $catname = test_input($_POST["catname"]);
  }
   if (empty($_POST["max_cand"])) {
    $maxcErr = "entry is required";
	$maxcErr1=1;
  } else {
    $max_cand= test_input($_POST["max_cand"]);
  }
   if (empty($_POST["vmale"])) {
    $vmaleErr = "entry is required";
	$vmaleErr1=1;
  } else {
    $vmale= test_input($_POST["vmale"]);
  }
   if (empty($_POST["vfemale"])) {
    $vfemaleErr = "entry is required";
	$vfemaleErr1=1;
  } else {
    $vfemale= test_input($_POST["vfemale"]);
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
				if($year_rec=="Third")
					$orig_key="IIITU172";
				if($year_rec=="Final")
					$orig_key="IIITU162";
			}
			if($branch_rec=="Computer Science")
			{
				if($year_rec=="Third")
					$orig_key="IIITU171";
				if($year_rec=="Final")
					$orig_key="IIITU161";
			}
			if($branch_rec=="Information Technology")
			{
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
	
		if($catnameErr1==1 || $rollfErr1==1 || $maxErr1==1 || $maxcErr1==1 || $vmaleErr1==1 || $vfemaleErr1==1)
		{
			echo"";
		}
	else
	{
		$naam1=$_POST["catname"];
		$anuk=$orig_key;
		$no_votes=$_POST["max_votes"];
		$no_cand=$_POST["max_cand"];
		$vmale=$_POST["vmale"];
		$vfemale=$_POST["vfemale"];
		$sql="INSERT INTO tprinfo(Catname,Rollf,Max_votes,Max_cand,v4male,v4female) VALUES('$naam1','$anuk','$no_votes','$no_cand','$vmale','$vfemale')";
	$quesy=mysqli_query($con,$sql);
	if($quesy)
	{
				echo "<p style='visibility:hidden'>saved</p>";?>
				<script language='javascript' type='text/javascript'> location.href='addel.php' </script><?php
				
				$sql1="create database $naam1";
	$query1=mysqli_query($con,$sql1);
	if($query1)
	{   
		mysqli_connect($server,$userid,$password,$naam);
		mysqli_select_db($con,$naam);
		$conn="create table $naam1.tpr_cand_signup (id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,candname varchar(20),candroll varchar(10) NOT NULL,candmob varchar(10) NOT NULL,Gender varchar(2),candvote int(4) NOT NULL,UNIQUE (candroll,candmob))" ;
		$conn1="create table $naam1.tpr_voter_signup (id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,candname varchar(20),candroll varchar(10)NOT NULL,candmob varchar(10) NOT NULL,Gender varchar(2),UNIQUE (candroll,candmob))" ;
		$conn2="create table $naam1.tpr_voter_login (id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,candname varchar(20),candroll varchar(10)NOT NULL,candmob varchar(10) NOT NULL,UNIQUE (candroll,candmob))" ;
		if(mysqli_query($con,$conn) && mysqli_query($con,$conn1) && mysqli_query($con,$conn2))
		{
			echo"created";
		}
		else
		{
			echo "error";
		}
	}
	else
	{
		echo "<div class=row><div class='col-md-1'></div>
			<div class='col-md-11'>error<br/>$sql</div></div>";
			die(mysqli_error($con));
	}
	}
	else
	{
		die(mysqli_error($con));
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

  <form method='post' enctype='multipart/form-data' action=<?php $_SERVER['PHP_SELF']?>>
		<h2><strong>Category Name</strong></h2><?php echo ""?><input type="text" id="catname" name="catname" placeholder="TPR_BRANCH" value="<?php echo $catname;?>">
  <span class="error"> <?php echo $catnameErr;?></span><br>
   <h2><strong>Maximum Votes</strong></h2><?php echo ""?><input type="text" id="max_votes" name="max_votes" value="<?php echo $max_votes?>">
  <span class="error"> <?php echo $maxErr;?></span><br>
  <h2><strong>Maximum Candidates</strong></h2><?php echo ""?><input type="text" id="max_cand" name="max_cand" value="<?php echo $max_cand?>">
  <span class="error"> <?php echo $maxcErr;?></span><br>
  <h2><strong>Maximum Votes for Male Candidate</strong></h2><?php echo ""?><?php echo ""?><input type="text" id="vmale" name="vmale" value="<?php echo $vmale?>">
  <span class="error"> <?php echo $vmaleErr;?></span><br>
  <h2><strong>Maximum Votes for Female Candidate</strong></h2><?php echo ""?><input type="text" id="vfemale" name="vfemale" value="<?php echo $vfemale?>">
  <span class="error"> <?php echo $vfemaleErr;?></span><br>
  <h2><strong>Choose Branch and Year</strong></h2><?php echo ""?>
  Branch:
 <select name="branch4">
   <option name="ece4">Electronics & Communication</option>
  <option name="cse4">Computer Science</option>
  <option name="it4">Information Technology</option>
</select>
 Year:  
 <select name="year4">
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
</div>";
echo "</div>";
?>
<?php
include("footer_2.php");  ?>
</div>
</body>
</html>