<?php   
include('database.php');
$obj =new boat();
$warn ="";

if(isset($_POST['login']))
{
  $email =$obj->safe_str($_POST['email']);
	$password =$obj->safe_str($_POST['pass']);

$res =$obj->selquery('*','user',['email'=>$email,'password'=>$password],'');

 if($res!=[])
 {
  $_SESSION['QR_USER_LOGIN']=true;
  $_SESSION['USER_ROLE'] =$res[0]['role'];
  $_SESSION['USER_NAME'] =$res[0]['name'];
    $obj->redirect('main.php');
    // print_r($res[0]['role']);
 }
 else
 {
   $warn ="Invalid Username or password!"; 
 }
  
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form validation in HTML & CSS | CodingNepal</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>

<body>
  <div class="wrapper">
    <header>Login Now!</header>
    <form method="post">
      <div class="field email">
        <div class="input-area">
          <input type="text" placeholder="Email" name="email">
          <i class="icon fas fa-user"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Email can't be blank</div>
      </div>
      <div class="field password">
        <div class="input-area">
          <input type="password" placeholder="Password" name="pass">
          <i class="icon fas fa-lock"></i>
          <i class="error error-icon fas fa-exclamation-circle"></i>
        </div>
        <div class="error error-txt">Password can't be blank</div>
      </div>
     
      <input type="submit" value="Login" name="login">
    </form>
    <span style="color: red;"><?php echo $warn ?></span>
    <br>  
    <br>  
    
    <div class="sign-txt">Not a member? <a href="#">Signup</a></div>
  </div>
</body>
</html>