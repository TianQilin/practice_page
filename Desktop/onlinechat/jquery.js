
$(document).ready(function() {

      $.ajax({
	      	method: "POST",
	      	url: "http://localhost/onlinechat/server.php",
	      	data: $('form').serialize(),	
	        datatype: 'JSON',
	        success: function (msg){
	           //alert(data);
	          document.getElementById('content1').innerHTML = msg;
	          
	        }
	      })
	       
	     $('#form')[0].reset();

       
	});

	


	    
$(document).ready(function() {
	$(".button").click(function(event){
     // var message = $("input#chat_space").val();
      event.preventDefault(); 
     
     // var $term = $("input[name='type_word']").val();
 var content = $("input#chat_space").val();
      
      $.ajax({
	      	method: "POST",
	      	url: "http://localhost/onlinechat/server.php",
	      	data: $('form').serialize(),	
	        datatype: 'JSON',
	        success: function (msg){
	          alert($("ul li:last"));
	          document.getElementById('content1').append($("li:last")) ;
	          
	        }
	      })
	       
	     $('#form')[0].reset();

       
	});

})     
	     
	
