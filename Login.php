<?php
session_start();
$usernameerr=$passworderr=$phoneerr=$mailiderr=$cityerr=$regusernameerr=$regpassworderr='';	
if(!empty($_SESSION["usernameerr"])) {
$usernameerr=$_SESSION["usernameerr"];
}
if(!empty($_SESSION["passworderr"])) {
$passworderr=$_SESSION["passworderr"];
}
if(!empty($_SESSION["phoneerr"])) {
$phoneerr=$_SESSION["phoneerr"];
}
if(!empty($_SESSION["mailiderr"])) {
$mailiderr=$_SESSION["mailiderr"];
}
if(!empty($_SESSION["cityerr"])) {
$cityerr=$_SESSION["cityerr"];
}
if(!empty($_SESSION["regusernameerr"])) {
$regusernameerr=$_SESSION["regusernameerr"];
}
if(!empty($_SESSION["regpassworderr"])) {
$regpassworderr=$_SESSION["regpassworderr"];
}
$_SESSION["done"]="Successfully Registered";
$_SESSION["error"]="Invalid Credentials";
?>

<!Doctype HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href= "Form.css" />
</head>
<body>

<div id="Outer">
<div id="left" >
<form action="/DatabaseDrivenWebpage/Form.php" method="POST" name="form">
<p><label>Username</label> <input type="text" name="regusername" placeholder="Your name"/> <p><?php  echo "<span style=\"color:red;\">$regusernameerr</span>";?></p></p>
<p><label>Password</label> <input type="password" name="regpassword" placeholder="Password"/> <p><?php  echo "<span style=\"color:red;\">$regpassworderr</span>";?></p></p>
<input type="Submit" value="Login" name="form1" />
</form>

<p><?php if(@$_GET['status'] == 'error'){echo $_SESSION["error"];} ?></p>
</div>

<div id="right">
<form action="/DatabaseDrivenWebpage/Form.php" method="POST" id="formm">
<p>*Username <input name="username" type="text" /> <?php  echo "<span style=\"color:red;\">$usernameerr</span>";?></p>
<p>*Password <input name="password" type="password" /> <?php echo "<span style=\"color:red;\">$passworderr</span>";?></p> 
<p>   *Phone <input name="phone" type="tel" /> <?php echo "<span style=\"color:red;\">$phoneerr</span>";?></p>
<p>  *MailId <input name="mailid" type="email" /> <?php echo "<span style=\"color:red;\">$mailiderr</span>";?></p>
<p>    *City <input name="city" type="text" /> <?php echo "<span style=\"color:red;\">$cityerr</span>";?></p>
<input type="Submit" value="Signup" name="form2" />
</form>

<p><?php if(@$_GET['status'] == 'success'){echo $_SESSION["done"];} ?></p>
</div></div></body></html>

<?php 
unset($_SESSION["usernameerr"]);
unset($_SESSION["passworderr"]);
unset($_SESSION["phoneerr"]);
unset($_SESSION["mailiderr"]);
unset($_SESSION["cityerr"]);
unset($_SESSION["done"]);
unset($_SESSION["regusernameerr"]);
unset($_SESSION["regpassworderr"]);
unset($_SESSION["error"]);
?>