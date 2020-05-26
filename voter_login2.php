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
<div class=well well-sm><h3><strong>ELECT REPRESENTATIVE</strong></h3></div>	
<div class=row><div class='col-md-1'></div><div class='col-md-11'>";
	echo"<div class='col-md-3'>";
	if(isset($_REQUEST['act']))
	{
		$cname=$_REQUEST['name'];
		$roll=$_REQUEST['roll'];
	$result = mysqli_query($con,"Select candname,id from $cname.cand_signup");

if($result)
	{
		 $Data= Array();
		 $k=mysqli_num_rows($result);
		 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
		{
				$Data[] =  $row['candname'];
				$Data1[] =  $row['id'];
		}
		for($i=0;$i<$k;$i++)
		{
				echo "<div class='row'>			
				<div class='col-md-3'>$Data[$i]</div>";
				$nk=$Data[$i];
				$mk=$Data1[$i];
				echo"<div class='col-md-2'><a  class='btn3 btn3-success' href='voter_login2.php?acts=1&&num=$mk&&ans=$cname&&roll=$roll' name='vote'>VOTE</a>
				</div></div><br>";
		}
	}
	}
	if(isset($_REQUEST['acts']))
				{
					$acto=$_REQUEST['acts'];
					$ik=$_REQUEST['num'];
					$am=$_REQUEST['ans'];
					$Roll=$_REQUEST['roll'];
					$dd="insert into $am.voter_login (candroll) value ('$Roll')";
					$aff=mysqli_query($con,$dd);
					$sql="select candvote from $am.cand_signup where id=$ik";
					$query=mysqli_query($con,$sql);
					$data=mysqli_fetch_row($query);
					$data1=$data[0]+1;
					$sql="update $am.cand_signup set candvote='$data1' where id=$ik";
					$aquery=mysqli_query($con,$sql);
					if($query && $aquery)
					{
					  	?>
						<script language='javascript' type='text/javascript'> location.href='success_2.php' </script>
						<?php
					}
					else
					{
						echo "error<br/>$sql";
						die(mysqli_error($con));
					}
				}


echo"</div></div><br><br>
</div><br><br><br>
</div>
</div>
</div>";
echo "</div>";
?>
</div>
<?php
include("footer_2.php");   ?>
<script>
</body>
</html>