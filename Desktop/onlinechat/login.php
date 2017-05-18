<?php 
  $connect = mysqli_connect('localhost','root','090921','onlinechat') or die('Unable to connect');
     
      $result = mysqli_query($connect, "SELECT username, password FROM login");
      
      if(array_key_exists('submit',$_POST)){
        $sql_insert = "INSERT INTO login (username, password) VALUES ('$_POST[username]', '$_POST[password]')";

        $addStudent = mysqli_query($connect, $sql_insert);
      }



?>