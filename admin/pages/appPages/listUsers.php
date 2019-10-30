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
              <button name="btnBack" id="btnBack" class="btn btn-block btn-warning btn-sm" style="display: none"><i class="fa fa-fw fa-hand-o-left"></i>Back</button>
              <div class="col-xs-6" id="heading"><h2><small>All Users</small></h2></div>

			 
              <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User Name</th>
                  <th>Phone No</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Updated At</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $usersList  = mysql_query("SELECT user_name, phone_no, email_id, password, updated_at FROM user ORDER BY user_id DESC") or die(mysql_error());
                  while($newList = mysql_fetch_array($usersList)){
                                

                                echo "<tr>";
                                echo "<td>".$newList['user_name']."</td>";
                                echo "<td>".$newList['phone_no']."</td>";
                                echo "<td>".$newList['email_id']."</td>";
                                echo "<td>".$newList['password']."</td>";
                                echo "<td>".$newList['updated_at']."</td>";
                                echo "</tr>";
                              
                              }

                  ?>
               <!--  <tr>
                  <td>User Name</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                </tr> -->
                
                </tbody>
                <tfoot>
                <tr>
                  <th>User Name</th>
                  <th>Phone No</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Updated At</th>
                </tr>
                </tfoot>
              </table>

              <!-- ASSIGNING DATA -->
              <div id="dragTopic" style="display: none;">
                <div>
              <div class="col-md-3">
          <div class="box box-default box-solid collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Expandable</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: none;">
              The body of the box
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
              <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Draggable Events</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-green ui-draggable ui-draggable-handle" style="position: relative; z-index: auto; width: 208.3px; right: auto; height: 30px; bottom: auto; left: 0px; top: 0px;">Lunch</div>
                <div class="external-event bg-yellow ui-draggable ui-draggable-handle" style="position: relative; z-index: auto; width: 208.3px; right: auto; height: 30px; bottom: auto; left: 0px; top: 0px;">Go home</div>
                <div class="external-event bg-aqua ui-draggable ui-draggable-handle" style="position: relative; z-index: auto; width: 208.3px; right: auto; height: 30px; bottom: auto; left: 0px; top: 0px;">Do homework</div>
                <div class="external-event bg-light-blue ui-draggable ui-draggable-handle" style="position: relative; z-index: auto; width: 208.3px; right: auto; height: 30px; bottom: auto; left: 0px; top: 0px;">Work on UI design</div>
                <div class="external-event bg-red ui-draggable ui-draggable-handle" style="position: relative; z-index: auto; width: 208.3px; right: auto; height: 30px; bottom: auto; left: 0px; top: 0px;">Sleep tight</div>
                <div class="checkbox">
                  
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
        </div>

</div>
</div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
             
				
				
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


<!-- page script -->
<script type="text/javascript">

    $(document).ready(function () {
      
      $('#example2 tr').click(function() {  
          
        var phone_no = $(this).find('td:eq(1)').text();
        alert(phone_no);
        var user_name  = $(this).find('td:eq(0)').text();

            document.getElementById('example2').style.display='none';
            document.getElementById('heading').innerHTML  ="<h2><small>Assign Data</small></h2>";
            document.getElementById('btnBack').style.display='block';
            document.getElementById('dragTopic').style.display='block';
            var action = "getUserTopics";


                /*$.post('../dataActions.php', {phone_no: phone_no,action:action},
            
             function(data){    
                alert(data);
                array = JSON.parse(data);
                console.log(array);
                
        
            }); */


    }); 
    
  });     
 </script>
 <script type="text/javascript">
    $('#btnBack').click(function() {  
      window.location.reload();
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
