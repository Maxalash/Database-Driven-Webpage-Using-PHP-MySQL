<?php
session_start();
$reg='';
if(!empty($_SESSION["regusername"])) {
$reg=$_SESSION["regusername"];
}
?>

<!Doctype HTML>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href= "Form.css" />
</head>
<body>
<div id="video">
<video controls >
	<source src="/DatabaseDrivenWebpage/Happy Birthday to You.mp4" type="video/mp4">
</video>
<div style="float:right;">
<h1>Hello <?php echo $reg;?></h1>
<h1>Happy Birthday 2 U</h1>
<img style="width:80px;height:80px;" src="/DatabaseDrivenWebpage/cake.gif" />
<form action="/DatabaseDrivenWebpage/Form.php" method="POST">
<input name="Logout" type="submit" value=Logout  />
</form></div></div><?php unset($_SESSION["regusername"]);?>
</body>
</html>