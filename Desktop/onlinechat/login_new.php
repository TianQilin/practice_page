<?php 
  $connect = mysqli_connect('localhost','root','090921','onlinechat') or die('Unable to connect');
     
      // $result = mysqli_query($connect, "SELECT username, password FROM login");
      
?>

<!DOCTYPE html>
<html>
<head>
	<title>online chat</title>
	<style type="text/css">
		form{
			text-align: center
		}
		form label{
			width: 79px;
			display: inline-block;
		}


	</style>
</head>
<body>
   <form method="post" action="chat.php">
     <label for="username">Username:</label>
   	 <input type="input" name="username"><br>
   	 
   	 <label for="password">Password: </label>
   	 <input type="input" name="password"><br>
   	 
   	 <input type="submit" name="submit_login" value="submit">

   </form>
</body>
</html>
