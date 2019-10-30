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
              <div class="col-xs-6"><h2><small>Delete User</small></h2></div>
            </div>

        <div class="box"></div>
            <!-- /.box-header -->
  		<!-- /.box-body -->
<!--Topics List-->
<div class="box-body">
        <div class="input-group margin">	

		<h3><small>Select User To Remove</small></h3>
          
            <select id="user_list" name="user_list" > 
              <?php
                           $getUser  = mysql_query("SELECT user_id,user_name
                                    FROM user
                                    ORDER BY user_id DESC");
                             if (empty($getUser)) { 
                              echo "<option>No Data Found</option>";
                             }
                            else{
                              echo "<option value='' ><h3>Select to Delete</h4></option>";
                              while($user_name = mysql_fetch_array($getUser)){
                                echo "<option value='".$user_name['user_id']."' ><h4>".$user_name['user_name']."</h4></option>";
                              }
                            }
       
                          ?>

              </select>
          <!-- /.box -->
           <input type="text" class="form-control" id="userTextbox" style="display: none;">
          <div style="display: none;" id= "Warning"></div>
           <button type="submit" name="confirmDelete" id="confirmDelete" class="btn btn-block btn-warning btn-sm" style="display: none;">     Confirm!
           </button>

        </div>
        <!-- /.col -->
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
      
      $('#user_list').change(function() {
        var user_id = $(this).val();

          document.getElementById('user_list').style.display="none";
 
          document.getElementById('Warning').innerHTML="<h4><i class='icon fa fa-warning'></i> All the details of this user will be deleted. Click 'Confirm!' to continue. </h4>";
          document.getElementById('Warning').style.display="block";
          document.getElementById('confirmDelete').style.display="block";
          document.getElementById('userTextbox').value = user_id;

            }); 
  
 }); 
</script>
<script type="text/javascript">
   $(document).ready(function () {
      
     $('#confirmDelete').click(function() {
       
        var user_id = document.getElementById('userTextbox').value;
        var action = "deleteUser";
       // console.log(username);

        $.post('action.php', {user_id:user_id,action:action},
    
       function(data){  
          console.log(data);
          if (data == "deleted") {
          alert("User had been removed.");
            location.reload();
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
