<?php

session_start();

$dbservername='localhost';
$dbname='mani';
$dbusername='root';
$dbpassword='';

$dbconn=mysqli_connect($dbservername,$dbusername,$dbpassword);
if(!$dbconn){
    die("Connection failed:". mysqli_connect_error());
}

$selected = mysqli_select_db($dbconn,"$dbname")
  or die("Could not select examples".mysqli_error($dbconn));

if(isset($_POST['Logout'])){
header("Location:Login.php");
}


if (isset($_POST['form2']))
{ 
if(empty($_POST["username"])) {
     $_SESSION["usernameerr"]="UserName is required";
   }
   else{
   $username=mysqli_real_escape_string($dbconn,$_POST["username"]);
   }
if(empty($_POST["password"])){
     $_SESSION["passworderr"]="Enter a password";
   }
   else{
   $password=mysqli_real_escape_string($dbconn,$_POST["password"]);
   }
if(empty($_POST["phone"])){
     $_SESSION["phoneerr"]="Phone number is required";
   } 
   else{
   $phone=mysqli_real_escape_string($dbconn,$_POST["phone"]);
   }
if(empty($_POST["mailid"])){
     $_SESSION["mailiderr"]="Enter a valid mail id";
   } 
   else{
    $mailid=mysqli_real_escape_string($dbconn,$_POST["mailid"]);
   }
if(empty($_POST["city"])){
    $_SESSION["cityerr"]="Enter your resident city";
   } 
   else{
   $city=mysqli_real_escape_string($dbconn,$_POST["city"]);
   }

if((!empty($_POST["username"])) and (!empty($_POST["password"])) and (!empty($_POST["phone"])) and (!empty($_POST["mailid"])) and (!empty($_POST["city"])) )
{
$res=mysqli_query($dbconn,"Insert into user(username,password,phone,mailid,city) values('$username','$password','$phone','$mailid','$city')");
if($res)
{
header("location:Login.php?status=success");
/* $to      = '$_POST["mailid"]';
 $subject = 'Registration';
 $message = 'You have Successfully registered';
 $headers = 'From:sjmani89@gmail.com';

 mail($to, $subject, $message, $headers);*/
}
}
else
{
header("location:Login.php");
} 
}

if(isset($_POST['form1']))
{ 
if(empty($_POST["regusername"])){
$_SESSION["regusernameerr"]="Enter your Username";
}
else
{
$regusername=mysql_real_escape_string($_POST["regusername"]);
$_SESSION["regusername"]=mysql_real_escape_string($_POST["regusername"]);
}
if(empty($_POST["regpassword"]))
{
$_SESSION["regpassworderr"]="Enter your Password";
}
else
{
$regpassword=mysql_real_escape_string($_POST["regpassword"]);
}	

if((!empty($_POST["regusername"])) and (!empty($_POST["regpassword"])))
{
$query="SELECT * FROM user WHERE username='".$regusername."' AND password='".$regpassword."'";
$result=mysqli_query($dbconn,$query);
$count=mysqli_num_rows($result);
if($count>=1)
{
header("location:homepage.php");
}
else
{
header("location:Login.php?status=error");
}
}
else
{
header("location:Login.php");
}
} 

 
mysqli_close($dbconn);
?>
