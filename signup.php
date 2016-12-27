<?php

    include "config.php";
    
$error123="";
$main_confirm="";
$main_error="";
    if(isset($_POST['submit'])){

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $contact = $_POST['contact'];
      $address = $_POST['address'];
      $email = $_POST['email'];
      $password = $_POST['pass'];
      
      
      $query1 = "SELECT email FROM users WHERE email='$email'";
      $query2 = "SELECT email FROM admin WHERE email='$email'";

      $q1_result = mysql_query($query1,$link);
      $q2_result = mysql_query($query2,$link);
      if(mysql_num_rows($q1_result)!=0 || mysql_num_rows($q2_result)!=0){
        
        
  
       
        
        $error123 = "Email already Exist";
        
        
      }else{
        
        // getting pid from persons table
        $query_pid = "SELECT Max(p_id) as pid FROM person";
        $pid_result = mysql_query($query_pid,$link);
        $pid_row = mysql_fetch_assoc($pid_result);
        $pid = $pid_row['pid'];
        $pid = $pid+1;

        //getting user_id from user table
        $query_userid = "SELECT Max(user_id) as userid FROM users";
        $userid_result = mysql_query($query_userid,$link);
        $userid_row = mysql_fetch_assoc($userid_result);
        $uid = $userid_row['userid'];
        $uid = $uid+1;

        $query1 = "INSERT INTO person (p_id, fname, lname, contact, address)
          VALUES ('$pid','$fname','$lname','$contact','$address')";

        $query2 = "INSERT INTO users (user_id, p_id, email, password)
          VALUES ('$uid','$pid','$email','$password')";  
        
        $q1_result = mysql_query($query1,$link);  
        $q2_result = mysql_query($query2,$link);

        if(mysql_affected_rows()>0) {
            $main_confirm = "Succesfully Registered";

        }else{

          $main_error = "Error Something bad";
        }


        

        
        
      }



    }





?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Login Page</title>

    
      <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    
  </head>
  <body  style="background:url(images/1231.jpg) no-repeat center">
  

    
      
   
    <div class="row">
     <h1 style="text-align: center;">Signup</h1>
    <div class="col-sm-offset-3 col-sm-6"> 

 
  
     
    <div role="tabpanel" class="tab-pane" id="profile">
      <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" name="fname" placeholder="First Name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Last Name</label>
    <input type="text" class="form-control" name="lname" placeholder="Last Name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Contact</label>
    <input type="text" class="form-control" name="contact" placeholder="Phone Number">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" class="form-control" name="address" placeholder="Address">
  </div>

  
      <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
    <div class="alert alert-success" id="success">
      <span >A valid email address!</span>
      </div>
      <div class="alert alert-danger" id="error">
      <span >Not a valid email address</span>
      </div>

      
      <span ><font color="red"><?php echo $error123; ?></font></span>
      
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
    <div class="alert alert-danger"id="error1">
        <span >Not a valid password</span>
      </div>
      <div class="alert alert-success" id="success1">
          <span >A valid password</span>
      </div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Password">
    <div class="alert alert-danger" id="error2">
      <span >Password Not Matched</span>
      </div>
      <div class="alert alert-success" id="success2">
          <span >Password Matched</span>
      </div>
      </div>
  

  
  <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>
<span ><font color="red"><?php echo $main_error; ?></font></span>
<span ><font color="green"><?php echo $main_confirm; ?></font></span>
  
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <script>

$(document).ready(function()
{


$("#success").hide();
$("#error").hide();
$("#success1").hide();
$("#error1").hide();
$("#success2").hide();
$("#error2").hide();

$("#email").keyup(function () 

{
    var email = $("#email").val();

  var reg = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;

if (reg.test(email)) {

    $('#success').show();
    $('#error').hide();
} else {
    $('#error').show();
    $('#success').hide();
}
})

$("#pass").keyup(function () 

{
    var pass = $("#pass").val();

  var reg1 = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,}/;

if (reg1.test(pass)) {

    $('#success1').show();
    $('#error1').hide();
} else {
    $('#error1').show();
    $('#success1').hide();
}

})

$("#confirm").keyup(function () 

{
    var pass = $("#pass").val();
  var confirm = $("#confirm").val();
  if(confirm==pass){
  $('#success2').show();
    $('#error2').hide();
} else {
    $('#error2').show();
    $('#success2').hide();
}


})


})


</script>
  </body>
</html>