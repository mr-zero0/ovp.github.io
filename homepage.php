<!DOCTYPE html>
<?php
include("connection.php");
?>
<html>
<head>
<?php
include("script.php");
?>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="image/img_1.png" alt="Vote" width="1200" height="700">    
      </div>

      <div class="item">
        <img src="image/img_2.0.jpg" alt="Vote" width="1200" height="700">   
      </div>
    
      <div class="item">
        <img src="image/img_3.0.jpg" alt="Vote" width="1200" height="700">
              
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<?php
echo"<br><br>
<div class='container-fluid'>
<div class='row'>
<div class='col-md-12'>
<div class='panel panel-primary min_h'>
<div class=well well-sm><h3><strong>ELECTIONS ARE OPEN FOR</strong></h3></div>
<div class=panel-body>";
	$result = mysqli_query($con,"SELECT Catname FROM catinfo");
	if($result)
	{
		 $Data= Array();
		 $k=mysqli_num_rows($result);
		 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
		{
				$Data[] =  $row['Catname'];  
		}
		for($i=0;$i<$k;$i++)
		{
				echo "<div class='col-md-2'><a href='votes1.php?act=1&name=$Data[$i]' class='btn3 btn3-primary'>$Data[$i]</a></div>";
		}
	}
  echo"</div>";
  echo"<div class=panel-body>";
  $querry="SELECT Catname FROM tprinfo";
	$result2 = mysqli_query($con,$querry);
	if($result2)
	{
		 $Data2= Array();
		 $l=mysqli_num_rows($result2);
		 while ($row2= mysqli_fetch_array($result2, MYSQLI_ASSOC)) 
		{
				$Data2[] =  $row2['Catname'];  
		}
		for($i=0;$i<$l;$i++)
		{
				echo "<div class='col-md-2'><a href='votes2.php?act=1&name=$Data2[$i]' class='btn3 btn3-primary'>$Data2[$i]</a></div>";
		}
	}
  echo"</div>";
  echo"</div>
</div>
</div>
<hr>";


echo "</div>";
include("project.php");
include("footer.php");
?>

</div>
</body>
</html>