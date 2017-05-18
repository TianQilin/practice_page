<?php 
  
  $connect = mysqli_connect('localhost','root','090921','onlinechat') or die('Unable to connect');

  //insert new user
   if(array_key_exists('submit_login',$_POST)){
        $sql_insert = "INSERT INTO login (username, password) VALUES ('$_POST[username]', '$_POST[password]')";

        $addStudent = mysqli_query($connect, $sql_insert);
   }
  //send messages
   if(array_key_exists('submit',$_POST)){
        $sql_insert = "INSERT INTO content (content) VALUES ('$_POST[type_word]')";

        $addStudent = mysqli_query($connect, $sql_insert);
   } 

   $result = mysqli_query($connect, "SELECT content FROM content");
      
   $user_name = mysqli_query($connect, "SELECT username FROM login");



	 // session_start();
	 // $_SESSION['username'] = $_POST['username']; 
    
    $a = array();
    
   
    
    function formatList(){  
       	
         global $result; 
         global $user_name;

       
            while($row = mysqli_fetch_row($user_name)){
             
	         	foreach($row as $r){
                 $current_user = $r;
	         		//print "$r";
	         	}  
         	}
           	
           // var_dump($uname_array);

          $stu = '<ul id="messages">';
          while( $a = mysqli_fetch_row($result) ){
             $stu .= '<li>';
             $stu .=  $current_user . ': '. implode("", $a); 
             $stu .= '</li>';
               
          } 
          $stu .= '</ul>';
       
        return $stu;
      
         // string json_encode($stu)
    }

mysqli_close($connect);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<style type="text/css">
		* { margin: 0; padding: 0; box-sizing: border-box; }
    #chat_id{
			position: absolute;
			bottom: 0px;
			width: 62%;

		}

		#chat_id > form > input{
			font-size: 20px;

		}
    
    form {
      background: #000; 
      padding: 3px; 
     
    }

    form input{
      border: 0;
      padding: 10px;
      width: 90%;
      margin-right: .5%;
    }

    form button { 
      width: 9%; 
      background: rgb(130, 224, 255); 
      border: none; 
      padding: 10px; 
    }
    

		#chat_space{
			width: 750px;
		} 
        
    #messages{
    	list-style-type: none;
      margin: 0;
      padding: 0;
      width: 520px;
    }

    #messages li{
      padding: 5px 10px;
    }
    
    #messages li:nth-child(odd){
      background: #eee;
    }
	</style>

<script type="text/javascript">

</script>
</head>

<body>
   <div id="content1"></div>
    <?php 
	      if(count($a > 0)){
	        echo formatList();
	      }else{
	          echo "no lists here";
	      } 
     ?>
   <div id="chat_id">
	   
	   <form method="post" action="chat.php" >
		     <label for="type_word" ></label>
		   	 <input type="input" name="type_word" id="chat_space">
		   	 
		   	 <button name="submit" value="Enter" onclick="loadXMLDoc()">Enter</button>

	   </form>
 
   </div>
</body>
</html>