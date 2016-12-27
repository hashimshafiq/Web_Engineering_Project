<?php

  include "config.php";
  $error="";
  if(isset($_POST['submit'])){
    //sql injection
    $email = stripslashes($_POST["email"]); 
    $email = mysql_real_escape_string($email);
    $pass = stripslashes($_POST["pass"]); 
    $pass = mysql_real_escape_string($pass);
  

    $result1 = mysql_query("SELECT email, password FROM admin WHERE email = '$email' AND  password = '$pass'",$link);
    

        if(mysql_num_rows($result1) > 0 )
        { 
            session_start();
            $_SESSION["logged_in"] = true;
            $_SESSION["email"] = $email;
            $_SESSION['pass'] = $pass;
            header("Location:addplace.php"); 
        }
        else
        {
            $error= "The username or password are incorrect!";
        }
  }  



?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Admin Login</title>

    
      <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    
  </head>
  <body  style="background:url(images/1231.jpg) no-repeat center">
  

    
      
   
    <div class="row">
     <h1 style="text-align: center;">Admin Login</h1>
    <div class="col-sm-offset-3 col-sm-6"> 

 
  
      <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
    <div class="alert alert-success" id="success">
      <span >A valid email address!</span>
      </div>
      <div class="alert alert-danger" id="error">
      <span >Not a valid email address</span>
      </div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>
<br />
<a href="login.php">Are you user ? Click here</a>
<span ><font color="red"><?php echo $error; ?></font></span>
    
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   <script>
$(document).ready(function(){
$("#success").hide();
$("#error").hide();
$("#email").keyup(function () {
    var email = $("#email").val();

var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;
if (re.test(email)) {
    $('#success').show();
    $('#error').hide();
} else {
    $('#error').show();
    $('#success').hide();
}
});
});
</script>
  </body>
</html>