<?php
session_start();
require'config.php';

$email=$password="";
$emailError=$passwordError=$loginError="";
//process the form
if($_SERVER['REQUEST_METHOD']=='POST'){
  //check if email is empty
  if(empty($_POST['email'])){
  $emailError="please enter email address.";

}else {
$email=$_POST['email'];
  
}
//check password is empty
if(empty($_POST['password'])){
$passwordError="please enter password.";
}else {
$password=$_POST['password'];
}
if(empty($emailError) && empty($passwordError)){
  
  //prepare select statement
  $sql="SELECT *From users WHERE email=? AND password=? ";
  if($statement=$conn->prepare($sql)){
  //bind
  $statement->bind_param("ss",$p_email ,$p_pass);
  //set parameters
  $p_email=$email;
  $p_pass=$password;

  //attempt execute
  if($statement->execute()){
  $result= $statement->get_result();

  if ($result->num_rows ==1){
  $data=$result->fetch_assoc();

  //store in data session
  $_SESSION["loggedin"]= true;
  $_SESSION["id"]= $data['id'];
  $_SESSION["email"]=$data["email"];
  $_SESSION["name"]=$data["name"];

  header("location:index.php");
}else{
  $loginError="Username or password doesn't match.";
}
}
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST']; ?>/CRUD1/assets/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST']; ?>/CRUD1/assets/plugins/font-awesome/css/font-awesome.min.css">
   <!-- Ionicons -->
  <link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST']; ?>/CRUD1/assets/plugins/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://<?=$_SERVER['HTTP_HOST']; ?>/CRUD1/assets/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
 
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>Login</b>Form</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
     <div class="alert alert-danger"><?=$loginError?></div>
    <form action= "<?php echo$_SERVER['PHP_SELF']; ?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <span class="text-danger"> <?=$emailError ;?></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password"  name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span class="text-danger"><?=$passwordError ;?></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   

    <a href="#">I forgot my password</a><br>
    <a href="login.php" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="http://<?=$_SERVER['HTTP_HOST'];?>/CRUD1/assets/plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://<?=$_SERVER['HTTP_HOST'];?>/CRUD1/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="http://<?=$_SERVER['HTTP_HOST'];?>/CRUD1/assets/js/adminlte.min.js"></script>

</body>
</html>
