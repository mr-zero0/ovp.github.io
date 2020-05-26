<?php
include("connection.php");
?>
<html>
<head>
<?php
include("script.php");
?>
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
<div class=well well-sm><h3><strong>CHOOSE CATEGORIES FOR ELECTIONS</strong></h3></div>	
<div class=row><div class='col-md-1'></div>";
echo"<div class='col-md-1'>";?>
  <a href='cat_config.php' class='btn btn-primary'>CR</a></div>
  <div class='col-md-1'><a href='tprs.php' class='btn btn-primary'>TPR</a></div>
<?php
echo"</div><br><br><br><br><br><br><br>
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