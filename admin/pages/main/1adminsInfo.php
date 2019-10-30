<!DOCTYPE html>
<?php
//echo dirname(dirname(dirname(__FILE__))); 
include_once(dirname(dirname(dirname(__FILE__)))."/include/config.php");
//echo $_SESSION['aid'];
//check admin logged in or not
if(isset($_SESSION['aid'])){

include_once("../header.php");


?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<?php 
		include_once("../sideMenu.php");
	?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">  
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <div class="col-xs-6"><h2><small>Info</small></h2></div>
			  <div class="col-xs-6 right_txt_align">
				<button class="btn btn-primary" style="float:right;margin-right: 40px;" data-toggle="modal" data-target="#addZoneModal">Add Zone</button>	
				<div class="modal fade" id="addZoneModal" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">			
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Add Zone details</h4>
					  </div>
					  <div class="modal-body">														  
					  <form class="editNewsForm" id="addZoneForm" name="addZoneForm"  enctype="multipart/form-data" method="post">
							  <table>							  
									<tr>
										<td><label>Zone Name:</label></td>
										<td><input type="text"  class="form-control"   name="add_zone_name"  id="add_zone_name" /><br/></td>
									</tr>								
								</table>
								<div class="modal-footer">
							<button type="submit" name="addZone" class="btn btn-primary" id="addZone">Save changes</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>									
							</div>								
						</form>				
					
					  </div>
					 </div>
					</div>
				</div>
            </div>
			</div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
				  <th>Zone name</th>
				  <th>Edit</th>
				  <th>Delete</th>	
                </tr>
                </thead>
                <tbody>
					<?php 
					$i = 1;
					$zoneListDetails = mysql_query("SELECT * FROM zone_data") or die(mysql_error());
					while($zoneInfo = mysql_fetch_array($zoneListDetails)){
						
					?>
					<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $zoneInfo['zone_name']; ?></td>
					<td>
					<div class="edit_button_css" data-toggle="modal" data-zone_data_id="<?php echo $zoneInfo['zone_data_id']; ?>"
					data-zone_name="<?php echo $zoneInfo['zone_name']; ?>" 
					data-target="#editZonePopup" id="editZoneData" />
					<span class="glyphicon glyphicon-edit"></span>
					</div>
					</td>
					<td><div class="delete_button_css" onclick="deleteZone(<?php echo $zoneInfo['zone_data_id'];?>)">
					<span class="glyphicon glyphicon-remove"></span></div></td>
					</tr>
					<?php
						$i++;
					}
				  ?>
				</tbody>
                
              </table>
			  <div class="modal fade" id="editZonePopup" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Edit Zone Data</h4>
							  </div>
							  <div class="modal-body">								
								
							  <form class="editAdminForm" id="editAdminForm" name="editAdminForm"  enctype="multipart/form-data" method="post">
							  <table>
								<tr>									
									<td><input type="hidden"  class="form-control"  name="edit_zone_data_id"  id="edit_zone_data_id" /><br/></td>
								</tr>
								<tr>
								<td><label>Zone Name:</label></td>
								<td><input type="text"  class="form-control"   name="edit_zone_name"  id="edit_zone_name" /><br/></td>
								</tr>
								</table>
								
								<div class="modal-footer">
								<input type="submit" name="editZone" class="btn" id="editZone" value="Save Changes"/>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>									
								</div>
								</form>
							
							  </div>
							 </div>
							</div>
						</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	     <div class="row">
        <div class="col-xs-12">  
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <div class="col-xs-6"><h2>Admin<small>Info</small></h2></div>
			  <div class="col-xs-6 right_txt_align">
					<button class="btn btn-primary" style="float:right;margin-right: 40px;" data-toggle="modal" data-target="#aboutChurchModal">Add Admin</button>	
				<div class="modal fade" id="aboutChurchModal" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">			
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Add Admin details</h4>
					  </div>
					  <div class="modal-body">														  
					  <form class="editNewsForm" id="addChurchForm" name="addChurchForm"  enctype="multipart/form-data" method="post">
							  <table>
							  
								<tr>
								<td><label>User Name:</label></td>
								<td><input type="text"  class="form-control"   name="add_username"  id="add_username" /><br/></td>
								</tr>

								<tr>
								<td><label>Password:</label></td>
								<td><input type="text"  class="form-control"   name="add_password"  id="add_password" /><br/></td>
								</tr>
								
								<tr>
								<td><label>Email:</label></td>
								<td><input type="text"  class="form-control"   name="add_email"  id="add_email" /><br/></td>
								</tr>
								<tr>
								<td><label>Upload profile pic:</label></td>
								<td>
									<input type="file" title="Choose image" class="form-control"   name="profile_image" id="profile_image" ><br/>
								</td>								
								</tr>
								
								<tr>
								<td><label>Zone:</label></td>
								<td>
								
								<select class="form-control" name="add_zone"  id="add_zone" >
									<option value=''>Select One</option>
									<?php 
										$getMallListDetails = mysql_query("SELECT * FROM zone_data") or die(mysql_error());
										while($mallListInfo = mysql_fetch_array($getMallListDetails)){
										?>
										<option value="<?php echo $mallListInfo['zone_data_id']?>"><?php echo $mallListInfo['zone_name']?></option>
										<?php
										}
									?>
								</select>
								
								<br/></td>
								</tr>
								</table>
								<div class="modal-footer">
							<button type="submit" name="addAdmin" class="btn btn-primary" id="addAdmin">Save changes</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>									
							</div>								
						</form>				
					
					  </div>
					 </div>
					</div>
				</div>
            </div>
			</div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">

				  <thead>
				  <tr>
				  <th>S.No</th>
				  <th>Admin name</th>
				  <th>Admin Email</th>
				  <th>Password</th>					 				 
				  <th>Profile Image</th>					 				 
				  <th>Zone</th>					 				 
				  <th>Created At</th>		 				 
				  <th>Edit</th>		 				 
				  <th>Delete</th>		 				 
				  
				  </tr>
				  </thead>
				   <tbody>
				  <?php 
					$i = 1;
					$adminListDetails = mysql_query("SELECT * FROM admin WHERE username<>'admin123' AND password <>'admin123'") or die(mysql_error());
					while($adminInfo = mysql_fetch_array($adminListDetails)){
						$zone_data_id = $adminInfo['zone'];
						//echo "SELECT * FROM mall_list WHERE mall_list_id=".$mall_list_id;

						//get mall name
						$getMallDetails = mysql_query("SELECT * FROM zone_data WHERE zone_data_id=".$zone_data_id) or die(mysql_error());
						$mallDetailsInfo = mysql_fetch_array($getMallDetails);
					?>
					<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $adminInfo['username']; ?></td>
					<td><?php echo $adminInfo['email']; ?></td>
					<td><?php echo $adminInfo['password']; ?></td>
					<td><img src="<?php echo $adminInfo['profile_image']; ?>" width="100" height="80" /></td>
					<td><?php echo $mallDetailsInfo['zone_name']; ?></td>
					<td><?php echo $adminInfo['created_at']; ?></td>
					
					
					
					<td>
					<div class="edit_button_css" data-toggle="modal" data-admin_id="<?php echo $adminInfo['admin_id']; ?>"
					data-username="<?php echo $adminInfo['username']; ?>" data-password="<?php echo $adminInfo['password']; ?>" 
					data-email="<?php echo $adminInfo['email']; ?>"   
					data-target="#editAdminPopup" id="editAdminData" />
					<span class="glyphicon glyphicon-edit"></span>
					</div>
					</td>
					<td><div class="delete_button_css" onclick="deleteAdmin(<?php echo $adminInfo['admin_id'];?>)">
					<span class="glyphicon glyphicon-remove"></span>
					</div></td>
					</tr>
					<?php
						$i++;
					}
				  ?>
				 
			  
				 </tbody>
				</table>
				
					<div class="modal fade" id="editAdminPopup" tabindex="-1"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Edit Admin Data</h4>
							  </div>
							  <div class="modal-body">								
								
							  <form class="editAdminForm" id="editAdminForm" name="editAdminForm"  enctype="multipart/form-data" method="post">
							  <table>
								<tr>									
									<td><input type="hidden"  class="form-control"  name="edit_admin_id"  id="edit_admin_id" /><br/></td>
								</tr>
								<tr>
								<td><label>Admin username:</label></td>
								<td><input type="text"  class="form-control"   name="edit_username"  id="edit_username" /><br/></td>
								</tr>
								<tr>
									<td><label>Password:</label></td>
									<td><input type="text"  class="form-control"   name="edit_password"  id="edit_password" /><br/></td>
								</tr>	
								<tr>
								<td><label>Upload profile pic:</label></td>
								<td>
									<input type="file" title="Choose image" class="form-control"   name="edit_profile_image" id="edit_profile_image" ><br/>
								</td>								
								</tr>
								<tr>
								<td><label>Email:</label></td>
								<td><input type="text"  class="form-control"   name="edit_email"  id="edit_email" disabled /><br/></td>
								</tr>
								
								
								</table>
								
								<div class="modal-footer">
								<input type="submit" name="editAdmin" class="btn" id="editAdmin" value="Save Changes"/>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>									
								</div>
								</form>
							
							  </div>
							 </div>
							</div>
						</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
	include_once("../footer.php");
 ?>

  <?php
	include_once("../sideSettings.php");
 ?>

<!--emp list model script-->
<script type="text/javascript">
 $('.emp_list_scroll').on('click', function(e) {
  $('#emp_modal-scroll').modal({
    show: true
  });
});
 </script>

<!-- page script -->
<script>
  $(function () {
    $("#example2").DataTable();
    $('#example1').DataTable();
  });
</script>

<script type='text/javascript'>//<![CDATA[ 
$(document).on("click", "#editZoneData", function () {

	var zone_data_id = $(this).data('zone_data_id');				
	var zone_name = $(this).data('zone_name');								

	 $(".modal-body #edit_zone_data_id").val(zone_data_id);
	 $(".modal-body #edit_zone_name").val(zone_name);				
		 
	 
});	

//]]>  

</script>
<script type='text/javascript'>//<![CDATA[ 
$(document).on("click", "#editAdminData", function () {

	var admin_id = $(this).data('admin_id');				
	var username = $(this).data('username');								
	var password = $(this).data('password');								
	var email = $(this).data('email');								

	 $(".modal-body #edit_admin_id").val(admin_id);
	 $(".modal-body #edit_username").val(username);				
	 $(".modal-body #edit_password").val(password);				
	 $(".modal-body #edit_email").val(email);				
		 
	 
});	

//]]>  

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
