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
              <div class="col-xs-6"><h2><small>Categories</small></h2></div>
            </div>
            <!-- /.box-body -->

 
          <!-- /.box -->
          <div class="box">
           
			</div>
            <!-- /.box-header -->
  		<!-- /.box-body -->
<!--Topics List-->
<div class="box-body">
        <div class="input-group margin">	


				<h3><small>Enter User To Assign Current Data</small></h3>
					
						 <input type="text" id="userTextBox" name="topicTextBox" placeholder="Enter Phone No">		
                 
                  <h3><small>Select Category</small></h3>
					
						<select id="topics_list" name="topics_list" > 
							<?php
                   				 $getTopics  = mysql_query("SELECT DISTINCT topic_name
												            FROM topics
												            ORDER BY topic_name ASC");
	                   				 if (empty($getTopics)) { 
	                    				echo "<option>No Data Found</option>";
				                  	 }
				                    else{
				                    	echo "<option value = 'NEW CATEGORY'><strong>NEW CATEGORY</strong></option>";
				                    	while($topic_name = mysql_fetch_array($getTopics)){
				                    		echo "<option value='".$topic_name['topic_name']."' ><h4>".$topic_name['topic_name']."</h4></option>";
				                    	}
				                    }
			 
			                    ?>

							</select>
  <!-- /btn-group -->
                <input type="text" id="topicTextBox" name="topicTextBox" style="display: none;">
                <div style="display: none;" id= "Warning"> <h4><i class="icon fa fa-ban"></i> Category Name Already Exist!</h4></div>
               
              
              <!--End Topics List-->


              <!--Subtopics List-->
                 
				<h3 id="subTopicH" style="display: none;"><small>Select Sub Category</small></h3>
				<select id="sub_topics" name="sub_topics" style="display: none;"></select>
  <!-- /btn-group -->
                <input type="text" class="form-control" id="subtopicsTextbox" style="display: none;">
              
              <!--End subtopics List-->
				
<br>
<br>


              <!--Subtopics List-->
                 
				<h3 id="dataH" style="display: none;"><small>Data</small></h3>
  <!-- /btn-group -->
                <textarea id="textData" name="textData" style="height: 200px; width: 300px; resize: none; display: none;"  ></textarea>
              
              <!--End subtopics List-->
<br>			
    
          <button type="submit" name="btnDataSubmit" id="btnDataSubmit" class="btn btn-block btn-warning btn-sm" >Save</button>
        </div>
    </div>

  
          <!-- /.box -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	  
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

			$('#topics_list').change(function() {	
			//Setting Up all Variables
			
			var topicname = $(this).val();

			var topicList = document.getElementById("topics_list");
			var subTopicH = document.getElementById("subTopicH");
			var subtopics = document.getElementById("sub_topics");
			var subtopicsTextbox = document.getElementById("subtopicsTextbox");
			var topicTextBox = document.getElementById("topicTextBox");
			var dataH = document.getElementById("dataH");
			document.getElementById('Warning').style.display='none';
			var textData = document.getElementById("textData");
			
			if (topicname ==  "NEW CATEGORY" || topicname =="" ) {

				//console.log(topicname);
				topicTextBox.value="";
				topicTextBox.placeholder="Enter New Category";
				topicTextBox.disabled=false; 
				dataH.style.display='none';
				textData.value='';
				subtopicsTextbox.style.display='block';
				subtopicsTextbox.value='';
				subtopicsTextbox.disabled=false;
				subtopicsTextbox.placeholder="Enter New Sub-Category";
				textData.style.display='none';
				dataH.style.display='block';
				textData.style.display='block';
				textData.placeholder="Enter Data";

				//Remoiving previous Data
				while (subtopics.options.length) {
	     				   subtopics.remove(0);
	     		}
				var d = document.createElement("option");
				d.text = 'New Sub Topic';
			    subtopics.options.add(d);


			}
			else{

			
			 
			 var action = "getSubTopics";
			
			//Animation
			textData.value = "";	
			dataH.style.display='none';
			textData.style.display='none';
			subTopicH.style.display='block';
			subtopics.style.display='block';
			subtopicsTextbox.value='';
			subtopicsTextbox.style.display='none';
			topicTextBox.style.display='block';
			topicTextBox.value = topicname;
			topicTextBox.disabled="disabled";

			//Remoiving previous Data
			while (subtopics.options.length) {
     				    subtopics.remove(0);
     		}
     		var d = document.createElement("option");
				d.text = 'New Sub Category';
			    subtopics.options.add(d);


		 	$.post('action.php', {topicname:topicname,action:action},
		
			 function(data){	

			 //Converted to Javascript Array	
			var array = JSON.parse(data);	
			console.log(array);

			
			//Looping through Array for option List
			for (var key in array) {
			    if (array.hasOwnProperty(key) && array[key] != "") {
			        //console.log(key + " -> " + array[key]);
			        var c = document.createElement("option");
					c.text = array[key];
					
			        subtopics.options.add(c);
			        
			    }
			}
			if (c == undefined) {
				subtopicsTextbox.style.display='block';
				subtopicsTextbox.value='';
				subtopicsTextbox.placeholder="Enter New Sub-Category";
				textData.style.display='none';
				dataH.style.display='block';
				textData.style.display='block';
				textData.placeholder="Enter Data";
			}

			});	
			}    
		});	
	
 }); 	
   </script>
   <script>	
		
		$(document).ready(function () {	

			$('#sub_topics').change(function() {	
			
			var sub_topics = $(this).val();
			var selectedST = sub_topics;
			if (sub_topics == "New Sub Category" ) {
			var ttB = document.getElementById("topicTextBox").value;
			 document.getElementById("dataH").style.display='block';
			 document.getElementById("textData").style.display='block';
			 document.getElementById("subtopicsTextbox").style.display='block';
			 document.getElementById("subtopicsTextbox").value ="";
			document.getElementById("subtopicsTextbox").disabled=false; 
			 document.getElementById("subtopicsTextbox").placeholder = "Enter New Subtopic in "+ttB;
			 document.getElementById("textData").value="";
			 document.getElementById("textData").placeholder = "Enter Data";
			}
			
			 else{
			 document.getElementById("textData").value = "";	
			 var subtopics = document.getElementById("sub_topics");
			 var action = "getData";
			
			//Apna ghar ka animation
			 document.getElementById("dataH").style.display='block';
			 document.getElementById("textData").style.display='block';
			 document.getElementById("subtopicsTextbox").style.display='block';
			 document.getElementById("subtopicsTextbox").value = sub_topics;
			 document.getElementById("subtopicsTextbox").value = sub_topics;
			 document.getElementById("subtopicsTextbox").disabled="disabled"; 

			//Remoiving previous Data
						

		 	$.post('action.php', {sub_topics:sub_topics,action:action},
		
			 function(data){	
			 		//console.log(data);
			 		var selectedContent = data;
			 		document.getElementById("textData").value = data;
			});	
			}	    
		});	
 }); 

   </script>
<script>


	 $('#btnDataSubmit').click(function() {
		
	 			var userTextBox =   $("#userTextBox").val();
				var topicTextBox = $("#topicTextBox").val();
				var textData = $("#textData").val();
				var subtopicsTextbox = $("#subtopicsTextbox").val();	
				var action = "checkUpdateTopic";
				var subtopicsTextbox = document.getElementById("subtopicsTextbox").value;
				
				if (userTextBox == "") {
					alert("Phone No is Mandatory");
					location.reload();
				}
				if (topicTextBox == "" && subtopicsTextbox == "") {
					alert("Category And Sub-Category is Mandatory");
					location.reload();
				}
		
		 	$.post('action.php', {userTextBox:userTextBox,topicTextBox:topicTextBox,subtopicsTextbox:subtopicsTextbox,textData:textData,action:action},
		
			 function(data){
			 	
					alert(data);
					location.reload();

			 
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
