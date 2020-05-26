<?php
include("connection.php");
?>
<html>
<head>
<?php
include("script.php");
?>
<script>
 function del()
 {
	 var result=confirm("Confirm deletion?");
	 return result;
 }
</script>
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
<div class='col-md-12'>";?>
<div class='panel panel-primary'>
<div class=well well-sm><h3><strong>ADD OR DELETE CATEGORIES FOR ELECTIONS</strong></h3></div>	
<div class=row><div class='col-md-1'></div>
<?php
echo"<div class='col-md-11'>";
echo" <div class='btn-group btn-group-lg'>
  <a href='maincat.php' class='btn btn-primary'>Add a category for elections</a></div>
  <br><br>";
 
  $result = mysqli_query($con,"SELECT Catname,id FROM catinfo");
	if($result)
	{
		 $Data= Array();
		 $k=mysqli_num_rows($result);		 
		 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
		{
				$Data[] =  $row['Catname'];
				$Data1[] =  $row['id'];
				
		}
				
		for($i=0;$i<$k;$i++)
		{
				echo "<div class='row'>
				<div class='col-md-1'>$Data1[$i]</div>				
				<div class='col-md-2'>$Data[$i]</div>";
				$kkk=$Data[$i];
				$kk=$Data1[$i];
				
				echo"<div class='col-md-2'>
				<a  class='btn2 btn2-danger' href='addel.php?act=1&id=$kk&&nm=$kkk' onclick=' return del()'>Delete</a>
				</div></div><br>";
		}
	}
	echo "<br><br>";
	$result1 = mysqli_query($con,"SELECT Catname,id FROM tprinfo");
	if($result1)
	{
		 $Data2= Array();
		 $Data3= Array();
		 $k1=mysqli_num_rows($result1);
		 while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) 
		{
				$Data2[] =  $row['Catname'];
				$Data3[] =  $row['id'];
		}
		for($i=0;$i<$k1;$i++)
		{
				echo "<div class='row'>
				<div class='col-md-1'>$Data3[$i]</div>				
				<div class='col-md-2'>$Data2[$i]</div>";
				$kkk1=$Data2[$i];
				$kk1=$Data3[$i];
				echo"<div class='col-md-2'><a  class='btn2 btn2-danger' href='addel.php?act=2&id=$kk1&&nm=$kkk1' onclick=' return del()'>Delete</a>
				</div></div><br>";
		}
	}
	if(isset($_REQUEST['act']))
			{
			$act=$_REQUEST['act'];
			$cname=$_REQUEST['id'];
			$cnm=$_REQUEST['nm'];
				switch($act)
				{
					case 1:
						$sql="select Catname from catinfo where id=$cname";
						$query=mysqli_query($con,$sql);
						$row_data=mysqli_fetch_row($query);
						$sql="delete from catinfo where id=$cname";
						$asql="drop database $cnm";
						$query=mysqli_query($con,$sql);
						$aquery=mysqli_query($con,$asql);
						if($query && $aquery)
						{
							
							echo "<p style='visibility:hidden'>deleted</p>";?>
							<script language='javascript' type='text/javascript'> location.href='addel.php' </script>
				<?php
						}
						else
						{
							echo "error<br/>$sql";
							die(mysqli_error($con));
						}
						
						case 2:
						$sql="select Catname from catinfo where id=$cname";
						$query=mysqli_query($con,$sql);
						$row_data=mysqli_fetch_row($query);
						$sql="delete from tprinfo where id=$cname";
						$asql="drop database $cnm";
						$query=mysqli_query($con,$sql);
						$aquery=mysqli_query($con,$asql);
						if($query && $aquery)
						{
							
							echo "<p style='visibility:hidden'>deleted</p>";?>
							<script language='javascript' type='text/javascript'> location.href='addel.php' </script>
				<?php
						}
						else
						{
							echo "error<br/>$sql";
							die(mysqli_error($con));
						}
				}
			}
echo"<br><br><br><br></div>
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