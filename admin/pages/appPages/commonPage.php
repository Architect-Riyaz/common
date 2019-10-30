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
              <div class="col-xs-6"><h2><small>Edit Topics</small></h2></div>
            </div>

        <div class="box"></div>
            <!-- /.box-header -->
  		<!-- /.box-body -->
<!--Topics List-->
<div class="box-body">
        <div class="input-group margin">	

		<form>
				

        </form>
          <!-- /.box -->

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
