<?php
session_start();
if(!isset($_SESSION['uid'])){
    header("Location:login.php");

}

  include('config.php');

  $query = "SELECT * FROM place";
  $result = mysql_query($query,$link);
  
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
  margin: 0;
  min-width: 250px;
}

* {
  box-sizing: border-box;
  
}
ul {
  margin: 0;
  padding: 0;
}

ul li {
  cursor: pointer;
  position: relative;
  padding: 12px 8px 12px 40px;
  background: #eee;
  font-size: 18px;
  transition: 0.2s;

  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}


ul li:nth-child(odd) {
  background: #f9f9f9;
}

ul li:hover {
  background: #ddd;
}

.close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px
}

.close:hover {
  background-color: black;
  color: white;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

</head>
<body style="background:url(images/1231.jpg) no-repeat center">



<h3 align="center">Places</h3>
 <div class="row">
 <?php 
 while($r=mysql_fetch_array($result)){ 
    $img = "MyUploadImages/".$r['picture'];
    $pid = $r['place_id'];
    echo "<div class=\"col-sm-offset-0  col-sm-2\">
          <div>
          <a href=\"display.php?id=$pid\">
          <img  style=\"margin-left: 10%;\" src=\" $img \"  width=\"160\" height=\"130\">
          </a>
          </div>
          </div>";
}
  ?>

</div>
</body>
</html>