<?php 
  

  // $connect = mysqli_connect('localhost','root','090921','onlinechat') or die('Unable to connect');

  //insert new user
   // if(array_key_exists('submit_login',$_POST)){
   //      $sql_insert = "INSERT INTO login (username, password) VALUES ('$_POST[username]', '$_POST[password]')";

   //      $addStudent = mysqli_query($connect, $sql_insert);
   // }
 

   // $result = mysqli_query($connect, "SELECT content FROM content");
      
   // $user_name = mysqli_query($connect, "SELECT username FROM login");



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

//mysqli_close($connect);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
	<style type="text/css">
		#chat_id{
			position: absolute;
			bottom: 0px;
			width: 100%;

		}

		#chat_id > form > input{
			font-size: 20px;

		}

		#chat_space{
			width: 750px;
		} 
        
        #messages{
        	list-style-type: none;
        }

	</style>

<script type="text/javascript">
    function loadXMLDoc(){
       // var xmlhttp = event.target;
        if (window.XMLHttpRequest){
        // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
         alert('this is for Chrome');
        }else{
        // code for IE6, IE5
         var MSXML = ['MSXML2.XMLHTTP.5.0', 'MSXML2.XMLHTTP.4.0','MSXML2.XMLHTTP.3.0','MSXML2.XMLHTTP','Microsoft.XMLHTTP'];
         for(var i=0; n<MSXML.length; i++){
          var xmlhttp = new ActiveXObject(MSXML[i]);
         }
         //xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        
       
        xmlhttp.onreadystatechange = function(){
    	      if(xmlhttp.readyState < 4){
               document.getElementById('content1').innerHTML = "Loading...";

    	      }else if (xmlhttp.readyState == 4 ){
      	      	if(xmlhttp.status == 200 && xmlhttp.status < 300 ){
      	      		// var receivedMsg = JSON.parse(xmlhttp.responseText);

                   document.getElementById("content1").innerHTML = xmlhttp.responseText;
      	             // alert('working');
                   

                   alert(xmlhttp.responseText);
                   console.log(xmlhttp.responseText);
      	      	}
    	      }
          xmlhttp.addEventListener("load", transferComplete, false);

          function transferComplete(evt){
           // alert("The transfer is complete.");
          }
       }
      
    
     
     xmlhttp.open("POST", "http://localhost/onlinechat/server.php", true);
     xmlhttp.setRequestHeader("Content-Type","text/html")
     xmlhttp.send(null);
   
   // alert('transaction is completed'); 
        
   }
  
</script>
<script src="jquery-3.1.1.js"></script>
<script src="jquery.js"></script>

</head>
<body>
   <div id="content1"></div>
    <?php 
	      if(count($a > 0)){
	       // echo formatList();
	      }else{
	          echo "no lists here";
	      } 
     ?>
   <div id="chat_id">
	   
	   <form method="post" action="chat.php" id="form">
		     <label for="type_word" ></label>
		   	 <input type="input" name="type_word" id="chat_space">
		   	 
	   </form>
     <button name="submit" value="Enter" class="button">Enter</button>
     <div id ="time"></div>
   
   </div>
   <script type="text/javascript">
      var current_date = new Date();
      document.getElementById('time').innerHTML = current_date.getHours() + ':'+ current_date.getMinutes() + ':' + current_date.getSeconds();

   </script>
</body>
</html>