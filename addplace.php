<?php
  session_start();
if(empty($_SESSION['email'])){


    header("Location:index.php");
}

include('config.php');
$main_confirm="";
$main_error="";

if(isset($_POST['submit'])){ 

  $place_name = $_POST['place'];
  $place_location = $_POST['location'];
  $place_keyword1 = $_POST['k1'];
  $place_keyword2 = $_POST['k2'];
  $place_keyword3 = $_POST['k3'];

  $UploadedFileName=$_FILES['UploadImage']['name'];
   $tmp_name = $_FILES['UploadImage']['tmp_name'];
  if($UploadedFileName!='')
  {
    $upload_directory = "MyUploadImages/"; //This is the folder which you created just now
    $TargetPath=time().$UploadedFileName;
    if(move_uploaded_file($tmp_name, $upload_directory.$TargetPath)){    
          // getting place id from place table
          $query_pid = "SELECT Max(place_id) as pid FROM place";
          $pid_result = mysql_query($query_pid,$link);
          $pid_row = mysql_fetch_assoc($pid_result);
          $pid = $pid_row['pid'];
          $pid = $pid+1;
          
          $query = "INSERT INTO place (place_id, place_name, location, picture, keyword1,keyword2,keyword3)
          VALUES ('$pid','$place_name','$place_location','$TargetPath','$place_keyword1','$place_keyword2','$place_keyword3')";

          $q_result = mysql_query($query,$link);  
        

        if(mysql_affected_rows()>0) {
            $main_confirm = "Succesfully Added";

        }else{

          $main_error = "Error Something bad";
        } 
                             
    }
  }
}
?>






<!DOCTYPE html>
<html>
<head>
<link href="http://fonts.googleapis.com/css?family=Didact+Gothic" rel="stylesheet" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
  		
  	<title>Admin Panel</title>
</head>
<body>

<p align="center"> Welcome to Admin pannel </p>

<div class="row">
    <div class="col-sm-offset-1 col-sm-5"> 

	<form method="post" action='<?php $_SERVER['PHP_SELF'] ?>' enctype="multipart/form-data">

	 	<div class="form-group">
    	<label for="exampleInputEmail1">Place Name</label>
    	<input type="text" class="form-control" placeholder="Place Name" name="place">
  		</div>

      <div class="form-group">
      <label for="exampleInputEmail1">Location</label>
      <input type="text" class="form-control" placeholder="Place Name" name="location">
      </div>



		<div class="form-group">
    		<label for="email" id="email-ariaLabel" >Keywords 1</label>
    		<input id="k1" name="k1" type="text" class="form-control"  placeholder="Keywords about Place">
		</div>

		<div class="form-group">
    		<label for="email" id="email-ariaLabel" >Keywords 2</label>
    		<input id="k2" name="k2" type="text" class="form-control"  placeholder="Keywords about Place">
		</div>

		<div class="form-group">
    		<label for="email" id="email-ariaLabel" >Keywords 3</label>
    		<input id="k3" name="k3" type="text" class="form-control"  placeholder="Keywords about Place">
		</div>


		
        <div class="form-group">
        <input type="file"  name="UploadImage">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
       	</div>
        
        </form>

        <span ><font color="red"><?php echo $main_error; ?></font></span>
        <span ><font color="green"><?php echo $main_confirm; ?></font></span>
		
</body>
</html>