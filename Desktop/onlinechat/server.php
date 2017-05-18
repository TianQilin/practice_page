<?php 
//connection to databases;
    $connect = mysqli_connect('localhost','root','090921','onlinechat') or die('Unable to connect');  

        //$str = $_POST['content'];
        //send messages
       if($_POST){
            $sql_insert = "INSERT INTO content (content) VALUES ('$_POST[type_word]')";
            
            $addStudent = mysqli_query($connect, $sql_insert);
       } 
       
       $result = mysqli_query($connect, "SELECT content FROM content");
      
 function new_List(){  
       	
         global $result; 
        
           // var_dump($uname_array);

          $stu = '<ul id="messages"  name="content_message">';
          if($result){
            while( $a = mysqli_fetch_row($result) ){
               $stu .= '<li>';
               $stu .=  implode("", $a); 
               $stu .= '</li>';
                 
            } 

            $stu .= '</ul>';
          }
        return $stu;
      
         // string json_encode($stu)
  }
 
mysqli_close($connect);

 print new_List();      
   

?>
