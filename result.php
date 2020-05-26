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
<div class=well well-sm><h3><strong>RESULT OF THE ELECTION CONDUCTED</strong></h3></div>	
<div class=row><div class='col-md-1'></div><div class='col-md-11'>";
$c1=$_REQUEST['name'];
$sq="select * from $c1.cand_signup";
$result = mysqli_query($con,$sq);
	if($result)
	{
		 $Data= Array();
		 $Data1= Array();
		 $k=mysqli_num_rows($result);
		 while ($rop = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
		{
				$Data[] =  $rop['candname'];
				$Data1[] =  $rop['candvote'];
		}
		echo "<div class='row'>
				<div class='col-md-3'><h2><b>NAME OF CANDIDATE</b></h2></div>				
				<div class='col-md-3'><h2><b>NUMBER OF VOTES</b></h2></div></div>";
		for($i=0;$i<$k;$i++)
		{
				echo "<div class='row'>
				<div class='col-md-3'>$Data[$i]</div>				
				<div class='col-md-3'>$Data1[$i]</div>";
				$kkk=$Data[$i];
				$kk=$Data1[$i];
				echo"</div>";
		}
	}
echo "<br><br></div></div><br>
</div>
</div>
</div>";
echo "</div>";
?>
</div>
<?php
include("footer_2.php");  ?>
<script>
</body>
</html>