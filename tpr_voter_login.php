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
<div class='panel panel-primary min_h'>";
echo 
"<div class=well well-sm><h3><strong>VOTER LOGIN</strong></h3></div>";

$rollErr =  "";
$roll = "";
$rollErr1 =  0;
		
	if(isset($_POST['login']))
	{

	if (empty($_POST["roll"])) {
    $rollErr = "Roll no. is required";
	$rollErr1=1;
	} else {
    $roll = test_input($_POST["roll"]);
    }
	if( $rollErr1==1 )
		{
			echo"error";
		}
	else
	{
	
	$roll=$_POST['roll'];
	$count=0;
	$c1=$_REQUEST['name'];
	$rd="select * from $c1.tpr_voter_signup where candroll='$roll'";
	$res=mysqli_query($con,$rd);
	$count=mysqli_num_rows($res);
	$rd1="select * from $c1.tpr_cand_signup where candroll='$roll'";
	$res1=mysqli_query($con,$rd1);
	$count1=mysqli_num_rows($res1);
	if($count==1 || $count1==1)
	{
		$roll=$_POST['roll'];
		$_SESSION['voter']=$roll;
		$c1=$_REQUEST['name'];
		$c2=$_REQUEST['class'];
		$ss="select * from $c1.tpr_voter_login where candroll='$roll'";
		$ss1=mysqli_query($con,$ss);
		$ll=mysqli_num_rows($ss1);
		if($ll==1)
		{
			?><script type="text/javascript">
				alert("This Roll no. has already casted his vote");
				</script>
			<script language='javascript' type='text/javascript'>location.href='homepage.php'</script>
			<?php 
		}
		else{
			$dd1=mysqli_query($con,$dd);
			$t="create table $c1.vmale (id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, mroll varchar(20))";
			$t1=mysqli_query($con,$t);
			$tt="create table $c1.vfemale (id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, froll varchar(20))";
			$tt1=mysqli_query($con,$tt);
		header("Location: checktpr.php?act=5class=$c2&&name=$c1&&roll=$roll&&num=0&&clicked=0");}
	}
	else
	{
		?>
		<script type="text/javascript">
		alert("Roll no. is not registered");
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
<form method='post' onsubmit='return frm_check()' enctype='multipart/form-data' action='<?php $_SERVER['PHP_SELF']?>'>
 <h2><strong>Roll Number</strong></h2><?php echo ""?> <input type='text' name='roll' value='<?php echo $roll;?>'>
  <span class='error'> <?php echo $rollErr;?></span>
  <br><br>
  <input type='submit' name='login' value='LOGIN'>   
</form>
</div>
<?php
echo"</div><br><br><br>
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