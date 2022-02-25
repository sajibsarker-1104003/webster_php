<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Login & Register Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
	.login-form {
		width: 340px;
    	margin: 50px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Email" name="email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        </div>
        <div class="form-group">
            <input type="submit" value="Login" name="login-btn" class="btn btn-primary btn-block"/>
        </div>
        
    </form>

    <?php
    $conn=mysqli_connect('localhost','root','','webster');
    if(isset($_POST['login-btn'])){
      $email=$_POST['email'];
      $password=$_POST['password'];

      $select="SELECT * FROM user WHERE user_email='$email'";
      $run=mysqli_query($conn,$select);
      $row_user=mysqli_fetch_array($run);
      $db_email=$row_user['user_email'];
      $db_password=$row_user['user_password'];

      if($email==$db_email && $password==$db_password){
        echo "<script>window.open('index.php','_self');</script>";
        $_SESSION['email']=$db_email;

      }
      else{
        echo "invalid email or password";
      }

    }
    ?>
   
</div>
</body>
</html>   