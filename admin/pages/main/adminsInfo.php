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
     
      <div class="row">
        <div class="col-xs-12">  
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <div class="col-xs-6"><h2><small>Admin Details</small></h2></div>
			 
            </div>
            <!-- /.box-body -->

	     <div class="row">
        <div class="col-xs-12">  
          <!-- /.box -->

          <div class="box">
           
			</div>
            <!-- /.box-header -->
  		<!-- /.box-body -->
<!--Topics List-->
            <div class="box-body">
             <div class="input-group margin">
              <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center">Nina Mcintire</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">21,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">1,543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">84,287</a>
                </li>
              </ul>


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


<!-- page script -->



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
