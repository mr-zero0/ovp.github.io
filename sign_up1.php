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
<div class=well well-sm><h3><strong>ADMIN SIGNUP</strong></h3></div>	
		<div class=row><div class='col-md-1'></div>";

// define variables and set to empty values
$nameErr = $userErr = $rollErr = $passErr =  "";
$name = $user  = $roll = $pass = "";
$nameErr1 = $userErr1 = $rollErr1 = $passErr1 =  0;
$len=0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	$nameErr1=1;
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
	  $nameErr1=1;
    }
  }
  if (empty($_POST["roll"])) {
    $rollErr = "Roll no. is required";
	$rollErr1=1;
  } else {
    $roll = test_input($_POST["roll"]);
	$len=strlen($roll);
	if($len==5||$len==7||$len==10)
	{/*
		$rollcheck=$_POST["rollno"];
		$gg=0;
		$coun=0;
		$kk=0;
		if($len==5)
		{
			$num="1";
			$num2=(string)$num;
		}*/
		echo"";
	}
	else
	{
		$rollErr="invalid roll no.";
		$rollErr1=1;
	}
   
  }
  
  if (empty($_POST["user"])) {
    $userErr = "Username is required";
	$userErr1=1;
	} else {
    $user = test_input($_POST["user"]);
	
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
	
		if($nameErr1==1 || $rollErr1==1 || $userErr1==1 || $passErr1==1 )
		{
			echo"Error in formats";
		}
	else
	{
		$naam=$_POST['name'];
	$anuk=$_POST['roll'];
	$user=$_POST['user'];
	$passwd=$_POST['pass'];
	
	$count=0;
	$rd="select * from admin_signup where usern='$user'";
	$res=mysqli_query($con,$rd);
	$count=mysqli_num_rows($res);
	if($count>0)
	{
		?>
		<script type="text/javascript">
		alert("this username already exist please choose another");
		</script>
		<?php
	}
		$sql="insert into admin_signup(cname,rolln,usern,pwd) values('$naam','$anuk','$user','$passwd')";
	$query=mysqli_query($con,$sql);
	if($query)
	{
				echo "<p style='visibility:hidden'>saved</p>";
				?>
				<script language='javascript' type='text/javascript'> location.href='success.php' </script>";
				<?php
	}
	else
	{
		echo "<div class=row><div class='col-md-1'></div>
			<div class='col-md-11'>error<br/>$sql</div></div>";
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
		
<form method='post' onsubmit='return frm_check()' action='sign_up1.php' enctype='multipart/form-data' id="form1">
		  <h2><strong>Name</strong></h2><?php echo ""?><input type="text" size="40px" name="name" placeholder="Enter Your Name" value="<?php echo $name;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br>
  <h2><strong>Roll no.<?php echo ""?></strong></h2> <input type="text" size="40px" name="roll" placeholder="Enter Your Roll No." value="<?php echo $roll;?>">
  <span class="error"> <?php echo $rollErr;?></span>
  <br>
 <h2><strong>Username<?php echo ""?></strong></h2> <input type="text" size="40px" name="user" placeholder="Enter Your Username" value="<?php echo $user;?>">
  <span class="error"> <?php echo $userErr;?></span>
  <br>
  <h2><strong>Password<?php echo ""?></strong></h2><input type="password" size="40px" name="pass" placeholder="Enter Your Password" value="<?php echo $pass;?>">
  <span class="error"> <?php echo $passErr;?></span>
  <br><br>
  <button class='btn btn-default' type="submit" form="form1" value="Submit">Submit</button>  
</form>
</div>
</div>
</div>
</div>
</div>
<?php
echo "</div>";
?>
</div>
<?php
include("footer_2.php");
?>
</body>
</html>