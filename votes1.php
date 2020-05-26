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
<div class=well well-sm><h3><strong>SELECT CATEGORY</strong></h2></div>	";
if(isset($_REQUEST['act']))
{
	$act=$_REQUEST['act'];
	$cname=$_REQUEST['name'];
    $sql = "SHOW TABLES FROM $cname";
    $result = mysqli_query($con,$sql);

if (!$result) {
    echo "DB Error, could not list tables\n\n";
    echo 'MySQL Error: ' . mysqli_error($con);
    exit;
}

while ($row = mysqli_fetch_row($result)) 
{
    echo "<div class='row'><div class='col-md-1'></div><div class='col-md-4'><a href='$row[0].php?class=$row[0]&&name=$cname' class='btn btn-primary'>$row[0]</a></div></div><br>";
}
$ss="SELECT * FROM $cname.voter_login";
$ar=mysqli_query($con,$ss);
$numm=mysqli_num_rows($ar);
$qw="select max_votes from catinfo where catname='$cname'"; 
$qww=mysqli_query($con,$qw);
$arow=mysqli_fetch_row($qww);
if($numm>(10))
{
	echo "<div  class='row'><div class='col-md-1'></div><div class='col-md-5'><a href='result.php?class=results&&name=$cname' class='btn btn-primary'>Results</a></div></div><br>";
}
}
echo"</div>
</div>
</div>
</div>
<br><br></div>";
echo "</div>";
?>
</div>
<?php

include("footer_2.php");  ?>
</body>
</html>