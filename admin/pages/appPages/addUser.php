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
            </div>

        <div class="box"></div>
            <!-- /.box-header -->
  		<!-- /.box-body -->
<!--Topics List-->
<div class="box-body">
        <div class="input-group margin">	

			
			  <div class="col-xs-6"><h2><small>Username: 		<input type="text" id="user_name" required=""> </small></h2></div>
			  <div class="col-xs-6"><h2><small>Password: 		<input type="text" id="password" required=""> </small></h2></div>
			  <div class="col-xs-6"><h2><small>Phone No: 		<input type="text" id="phone_no" required=""> </small></h2></div>
			  <div class="col-xs-6"><h2><small>E - Mail ID  : 	<input type="text" id="email_id" required=""> </small></h2></div>
			  
			 <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-block btn-warning btn-sm" >Save</button>
			 
			
        

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
			
			$('#btnSubmit').click(function() {	
			//Setting Up all Variables
			
			var user_name = $("#user_name").val();
			var phone_no = $("#phone_no").val();
			var email_id = $("#email_id").val();
			var password = $("#password").val();

			console.log(user_name);
			if (user_name == '') {
				alert('Username is mandatory');
				 location.reload();
			}
			if (phone_no == '') {
				alert('Phone No is mandatory');
				 location.reload();
			}
			if (email_id == '') {
				alert('Email ID is mandatory');
				 location.reload();
			}
			if (password == '') {
				alert('Password is mandatory');
				 location.reload();
			}
			var action = "addUser";
		
		 	$.post('action.php', {user_name:user_name,email_id:email_id,phone_no:phone_no,password:password,action:action},
		
			 function(data){	

			 	if (data == 'success') {
			 		alert("User added Successfully");
			 		location.reload();
			 		}else{
			 			alert("Phone No already Exist");
			 		}

			});	
    
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
