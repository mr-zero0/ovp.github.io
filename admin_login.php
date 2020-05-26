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
<div class='panel panel-primary min_h'>";
echo 
"<div class=well well-sm><h3><strong>ADMIN LOGIN</strong></h3></div>";

$userErr = $passErr =  "";
$user = $pass = "";
$userErr1 = $passErr1 =  0;
		
	if(isset($_POST['login']))
	{

	if (empty($_POST["user"])) {
    $userErr = "Username is required";
	$userErr1=1;
	} else {
    $user = test_input($_POST["user"]);
    }
	
	if (empty($_POST["pass"])) {
    $passErr = "Password is required";
	$passErr1 =1;
	}
	
	if( $userErr1==1 || $passErr1==1 )
		{
			echo"";
		}
	else
	{
	
	$user=$_POST['user'];
	$passwd=$_POST['pass'];
	
	$count=0;
	$rd="select * from admin_signup where usern='$user' AND pwd='$passwd'";
	$res=mysqli_query($con,$rd);
	$count=mysqli_num_rows($res);
	if($count==1)
	{
		$_SESSION['user']=$user;
		?>
		<script language='javascript' type='text/javascript'> location.href='addel.php' </script>";
		<?php
	}
	else
	{
		?>
		<script type="text/javascript">
		alert("Enter valid enteries");
		</script>
		<?php
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
<div class=row><div class='col-md-1'></div>
<div class='col-md-11'>
<form method='post' onsubmit='return frm_check()' action='admin_login.php' enctype='multipart/form-data'>
 <h2><strong>Username</strong></h2><?php echo ""?><input type='text' size="40px" name='user' placeholder="Enter Your Name" value='<?php echo $user;?>'>
  <span class='error'> <?php echo $userErr;?></span>
  <br>
  <h2><strong>Password</strong></h2><?php echo ""?><input type='password' size="40px" name='pass' placeholder="Enter Your Password" value='<?php echo $pass;?>'>
  <span class='error'> <?php echo $passErr;?></span>
  <br><br>
  <input type='submit' name='login' value='LOGIN'>  
</form>
</div>
<?php
echo"</div>
</div>
";
echo "</div>";
?>
</div>
</div>
<?php
include("footer_2.php");
?>
</body>
</html>