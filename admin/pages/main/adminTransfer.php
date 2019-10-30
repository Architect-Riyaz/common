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
              <div class="col-xs-6"><h2>Members<small>Info</small></h2></div>
			 			  
			 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<div class="row">
				<!--Emp dropdown-->
				<div class="col-xs-4">						
						<label for="inputEmail" class="control-label col-xs-6">Select Admin</label>						
							<select class="form-control" name="admin_id" id="admin_id">
							<option value="">select one</option>
							<?php
								$adminDetails = mysql_query("SELECT * FROM admin WHERE role <> 'admin'") or die(mysql_error());
									while($adminInfo = mysql_fetch_array($adminDetails)){								
											echo '<option value="'.$adminInfo['admin_id'].'">'.$adminInfo['email'].'</option>';							    
								}
							?>
						</select>
						
				</div>
				<div class="col-xs-4">						
						<label for="inputEmail" class="control-label col-xs-6">Select Language</label>						
							<select class="form-control" name="member_language" id="member_language"  >
								<option value="0">select one</option>
								<option value="1">Kannada</option>
								<option value="2">Telugu</option>
								<option value="3">Hindi</option>
								<option value="4">English</option>
								<option value="-1">All</option>
								
							</select>
						
						
				</div>
					<div class="col-xs-2">
					<br/>
					<button class="btn btn-primary"  id="getMembersList">Done</button>
					</div>
				</div>
				<div class="row">
				<div class="col-xs-12">
				<br/>
				<br/>
				<div >
					<table id="example1" class="table table-striped" 
					data-toggle="table"
					   data-url="/gh/get/response.json/wenzhixin/bootstrap-table/tree/master/docs/data/data1/"
					   data-show-export="true"
					   data-export-types="['excel', 'pdf']"
					   data-export-options='{
						 "fileName": "testFile", 
						 "worksheetName": "test1",         
						 "jspdf": {                  
						   "autotable": {
							 "styles": { "rowHeight": 20, "fontSize": 10 },
							 "headerStyles": { "fillColor": 255, "textColor": 0 },
							 "alternateRowStyles": { "fillColor": [60, 69, 79], "textColor": 255 }
						   }
						 }
					   }'>
					  <thead>
					  <tr>
					  <th>S.No</th>
					  <th>Admin name</th>
					  <th>Member Name</th>					 				 
					  <th>Member Mobile</th>					 				 
					  <th>Language</th>		 				 
					  <th>Edit</th>		 				 
					  <th>Delete</th>		 				 
					  
					  </tr>
					  </thead>
					   <tbody id="memberDetails">	
						<tr>
						<td>--</td>
						<td>--</td>
						<td>--</td>
						<td>--</td>
						<td>--</td>
						<td>--</td>
						<td>--</td>
						</tr>
						</tbody>
					</table>
	
					  </div>
					  
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
									<td><label>Email:</label></td>
									<td><input type="text"  class="form-control"  disabled name="edit_email"  id="edit_email" /><br/></td>
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

<script>
 $(document).ready(function () {
       /*  $("#membersListForm").validate({
    	  	ignore: ":hidden",
        debug: true,
        rules: {
				admin_id: {
					required: true
				},
								 				
					
        },
        messages: {
				admin_id: {
						required: "please select one value"
						
				},	
                       
        }
    }); */
 $('#getMembersList').click(function() {
	 //alert('test');
    //if($('#membersListForm').valid()) {   
	
		var admin_id = $("#admin_id option:selected").val();
		var member_language = $("#member_language option:selected").val();		
		
		var action = "getMembersData";
			
			$.post('../dataActions.php', {admin_id:admin_id,member_language:member_language,action:action},
		function(data){	
				//alert(data);		
				document.getElementById("memberDetails").innerHTML=data;
				$("#example1").DataTable();
			});	
		//}
	 }); 
			
});
</script>
			<script>			
			  $(function () {
				$("#example1").DataTable();
				
				});
				</script>
				<script>
				$(document).ready(function() {
					$('#example').DataTable();
				} );
				</script>
				<script>			
			  $(function () {
				$("#table1").DataTable();
				
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