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
<div class=well well-sm><h3><strong>VOTER SIGNUP - STEP II</strong></h3></div>	
<div class=row><div class='col-md-1'></div>";
echo"<div class='col-md-11'>";?> 
<?php


// define variables and set to empty values
$nameErr = $rollErr = $mobErr = $passErr = "";
$names = $roll = $mob = $pass = "";
$nameErr1 = $rollErr1 = $mobErr1 = $candErr1 = $passErr1 = 0;
$len=0;
if (isset($_POST['submit'])) {
	
  if (empty($_POST["names"])) {
    $nameErr = "Name is required";
	$nameErr1=1;
  } else {
    $name = test_input($_POST["names"]);
    if (!preg_match("/^[A-Za-z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
	  $nameErr1=1;
    }
  }
  if (empty($_POST["roll"])) {
    $rollErr = "Roll no. is required";
	$rollErr1=1;
  } else  {
    $roll = test_input($_POST["roll"]);
			$count=0;
			$rd="select * from voters_signup where vroll='$roll'";
			$res=mysqli_query($con,$rd);
			$count=mysqli_num_rows($res);
			if($count>=1)
			{   $rollErr1=1;
				?>
				<script type="text/javascript">
				alert("Roll no. already registered");
				</script>
				<?php
			}			
			
			$len=strlen($roll);
			$c1=$_REQUEST['rollf'];
			$rollen=strlen($c1);
			for($i=0;$i<$rollen;$i++)
			{
				if($roll[$i]!=$c1[$i])
				{
					$rollErr="Enter a valid format no.";
					$rollErr1=1;
				}
			}
  }	
	if (empty($_POST["pass"])) {
    $passErr = "Password is required";
	$passErr1 =1;
    } else {
    $pass = test_input($_POST["pass"]);
	$len=strlen($pass);
	if($len<6)
	{
		$passErr="Password should have atleast 6 characters";
		$passErr1=1;
	}
    }
	
	if($nameErr1==1 || $rollErr1==1 || $candErr1==1 || $passErr1==1)
		{
			echo "";
		}
	else
	{
			$naam1=$_POST["names"];
			$anuk=$roll;
			$user=$_POST['roll'];
			$passwd=$_POST['pass'];
			$aw="insert into voters_signup (vname,vroll,pwd) values('$naam1','$anuk','$passwd')";
			
			$query=mysqli_query($con,$aw);
			if($query)
			{
						echo "<p style='visibility:hidden'>saved</p>";?>
						<script language='javascript' type='text/javascript'>location.href='success.php'</script>
						<?php 
				}
				else{
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
		
<div class='col-md-11'>
<form method='post' onsubmit='return frm_check()' enctype='multipart/form-data' action="<?php $_SERVER['PHP_SELF']?>">
<h2><strong>Name</strong></h2><?php echo ""?><input type="text" name="names" value="<?php echo $names;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br>
  <h2><strong>Roll Number</strong></h2><?php echo ""?><input type="text" name="roll" value="<?php echo $roll;?>">
  <span class="error"> <?php echo $rollErr;?></span>
  <br>
 <h2><strong>Password</strong></h2><?php echo ""?><input type="password" name="pass" value="<?php echo $pass;?>">
  <span class="error"> <?php echo $passErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>
</div>
</div>
</div>
</div>
</div>
<?php
echo"</div>
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