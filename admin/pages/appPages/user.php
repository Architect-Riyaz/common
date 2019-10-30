<!DOCTYPE html>
<?php
//echo dirname(dirname(dirname(__FILE__))); 
include_once(dirname(dirname(dirname(__FILE__)))."/include/config.php");
//echo $_SESSION['aid'];
//check admin logged in or not
if(isset($_SESSION['aid'])){



include_once("../header.php");


?>

<body class="hold-transition skin-yellow sidebar-mini">
<div class="wrapper">
	<?php 
		include_once("../sideMenu.php");
	?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	    <!-- Main content -->
    <section class="content">
     
        <div class="box">
            <div class="box-header">
              <div class="col-xs-6"><h2><small>Add User</small></h2></div>
              <i class="fa fa-fw fa-arrow-left">Back To List</i>
              
            </div>

        <div class="box"></div>
            <!-- /.box-header -->
  		<!-- /.box-body -->
<!--Topics List-->
<div class="box-body">
        <div class="input-group margin">	

		<form>	
			  <div class="col-xs-6"><h2><small>Username: 		<input type="text" id="user_name" required=""> </small></h2></div>
			  <div class="col-xs-6"><h2><small>Password: 		<input type="text" id="password" required=""> </small></h2></div>
			  <div class="col-xs-6"><h2><small>Phone No: 		<input type="text" id="phone_no" required=""> </small></h2></div>
			  <div class="col-xs-6"><h2><small>E - Mail ID  : 	<input type="text" id="email_id" required=""> </small></h2></div>
			  
			 <button type="submit" id="submit" name="submit" class="btn btn-block btn-warning btn-sm" >Save</button>
			 
			
        </form>

        </div>
      </div>
      <!-- /.row -->
	  </div>
    </section>
    <!-- /.content -->
   </div>
</div>
  <!-- /.content-wrapper -->
 <?php
	include_once("../footer.php");
 ?>

  <?php
	include_once("../sideSettings.php");
 ?>


<!-- page script -->
<script>
$(document).ready(function () {
			
			$('#submit').click(function() {	
			//Setting Up all Variables
			
			//var user_name = document.getElementById("user_name");
			var phone_no = $("#phone_no").val();
			console.log(phone_no);
			/*var email_id = document.getElementById("email_id");
			var password = document.getElementById("password");
			var action = "addUser";
		
		 	$.post('action.php', {user_name.value:user_name.value,email_id.value:email_id.value,phone_no.value:phone_no.value,password.value:password.value,action:action},
		
			 function(data){	

			 	console.log(data);

			 //Converted to Javascript Array	
			//var array = JSON.parse(data);	
			 
			//Looping through Array for option List
			/*for (var key in array) {
			    if (array.hasOwnProperty(key)) {
			        //console.log(key + " -> " + array[key]);
			        var c = document.createElement("option");
					c.text = array[key];
			        subtopics.options.add(c);
			    }
			}*/


			});*/	
    
		});	
	});
	
   </script>

 

<?php
	include_once("../footerScript.php");
?>

</body>
</html>
  <?php
 }else{
header("location:../adminLogin.php");
}
 ?>
