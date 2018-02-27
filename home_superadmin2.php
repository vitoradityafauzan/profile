<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Home As Super Admin</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>

<div class="container">
	<div class="page-header">
		<h3>Employee Profile</h3>
	</div>

	<form action="tambah.php">
	<button type="submit" class="btn btn-default">Tambah Data</button>
	</form><br/>
   
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Full Name</th>
						<th>View Profile</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$dbhost = 'localhost';
					$dbuser = 'root';
					$dbpass = '';
					$dbname = 'magang';


					$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

					if($conn->connect_error){
						die('Connection Error :'.$conn->connect_error);
					}
					$sql = "SELECT * FROM biodata";
					$data = $conn->query($sql);
					while($row = $data->fetch_array()){

					 ?>
					 <tr>
					 	<td><?php echo $row['fname']."&nbsp;".$row['lname'];?>
					 	</td>
					 	<td>
					 		<button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $row['id'];?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i>View</button>&nbsp;

                            <button data-id="<?php echo $row['id'];?>" class="btn delete_product"><i class="glyphicon glyphicon-trash"></i>Delete</button>&nbsp;
					 		
        			 	</td>
						</tr>
					 <?php
					}
					?>
					
				</tbody>
			</table>
		</div>
	</div>

	<div class="modal fade" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: :none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
					<h4 class="modal-title">
	                	<i class="glyphicon glyphicon-user"></i> User Profile
	                </h4> 
				</div>
				<div class="modal-body">
					<div id="modal-loader" style="display: none; text-align: center;">
						<img src="">
					</div>
					<!--Content will be loaded here-->
					<div id="dynamic-content">
						<!-- Kalo Data Type JSON-->
					  <div class="row"> 
                            <div class="col-md-12"> 
                            	
                            	<div class="table-responsive">
                            	
                            		<?php
										//include connection file 
										include_once("connection.php");
										$sql = "SELECT * FROM `employee` limit 1,10 ";
										$queryRecords = mysqli_query($conn, $sql) or die("error to fetch employees data");
									?>

                                <table id="employee_grid" class="table table-condensed table-hover table-striped table-bordered">

                           			<thead>
                           				<tr >
		                            	<th>First Name</th>
		                            	<td id="txt_fname"></td>
		                                </tr>
		                                     
		                                <tr>
		                            	<th>Last Name</th>
		                            	<td id="txt_lname"></td>
		                                </tr>
		                                       		
		                                <tr>
		                                <th>Email</th>
		                                <td id="txt_email"></td>
		                                </tr>
		                                       		
		                                <tr>
		                                <th>Mobile</th>
		                                <td id="txt_mobile"></td>
		                                </tr>

		                                <tr>
		                                <th>Position</th>
		                                <td id="txt_position"></td>
		                                </tr>

		                                <tr>
		                                <th>Division</th>
		                                <td id="txt_division"></td>
		                                </tr>
                           			</thead>

                           			<tbody id="_editable_table">
                           				<?php foreach($queryRecords as $res) :?>
									      <tr data-row-id="<?php echo $res['id'];?>">
									         <td class="editable-col" contenteditable="true" col-index='0' oldVal ="<?php echo $res['fname'];?>"><?php echo $res['fname'];?></td>

									         <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $res['lname'];?>"><?php echo $res['lname'];?></td>

									         <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $res['email'];?>"><?php echo $res['email'];?></td>

									         <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $res['mobile'];?>"><?php echo $res['mobile'];?></td>

									         <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $res['position'];?>"><?php echo $res['position'];?></td>

									         <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $res['division'];?>"><?php echo $res['division'];?></td>
									      </tr>
										  <?php endforeach;?>
                           			</tbody>
                                       		
                                </table>
                                
                                </div>
                                       
                            </div> 
                          </div>
                         <!--End Tabel Data Type JSON-->

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default">Edit</button>
					
				</div>
			</div>
		</div>
	</div>
</div>

<!--Index Script-->

<script src="../assets/jquery-1.12.4.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/bootbox.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$(document).on('click','#getUser', function(e){
		e.preventDefault();
		var uid = $(this).data('id');
		$('#dynamic-content').hide();

		$.ajax({
			type:'POST',
			url:'submit2.php',
			data:{id:uid},
			dataType:'json'
		}).done(function(data){
			console.log(data);
			$('#dynamic-content').show(); // show dynamic div
			$('#txt_fname').html(data.fname);
			$('#txt_lname').html(data.lname);
			$('#txt_email').html(data.email);
			$('#txt_mobile').html(data.phone);
			$('#txt_position').html(data.position);
			$('#txt_division').html(data.division);

		}).fail(function(){

			$('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
		});
	});
});
/*
function Delete_fnc(id){
	alert('delete'+id);
}*/
</script>

<!--Delete Script-->

<script>
	$(document).ready(function(){
		
		$('.delete_product').click(function(e){
			
			e.preventDefault();
			
			var pid = $(this).attr('data-id');
			var parent = $(this).parent("td").parent("tr");
			
			bootbox.dialog({
			  message: "Are you sure you want to Delete ?",
			  title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
			  buttons: {
				success: {
				  label: "No",
				  className: "btn-success",
				  callback: function() {
					 $('.bootbox').modal('hide');
				  }
				},
				danger: {
				  label: "Delete!",
				  className: "btn-danger",
				  callback: function() {
					  
					  /*
					  
					  using $.ajax();
					  
					  $.ajax({
						  
						  type: 'POST',
						  url: 'delete.php',
						  data: 'delete='+pid
						  
					  })
					  .done(function(response){
						  
						  bootbox.alert(response);
						  parent.fadeOut('slow');
						  
					  })
					  .fail(function(){
						  
						  bootbox.alert('Something Went Wrong ....');
						  						  
					  })
					  */
					  
					  
					  $.post('delete.php', { 'delete':pid })
					  .done(function(response){
						  bootbox.alert(response);
						  parent.fadeOut('slow');
					  })
					  .fail(function(){
						  bootbox.alert('Something Went Wrog ....');
					  })
					  					  
				  }
				}
			  }
			});
			
			
		});
		
	});
</script>

<!--Edit Script-->

<script type="text/javascript">
$(document).ready(function(){
	$('td.editable-col').on('focusout', function() {
		data = {};
		data['val'] = $(this).text();
		data['id'] = $(this).parent('tr').attr('data-row-id');
		data['index'] = $(this).attr('col-index');
	    if($(this).attr('oldVal') === data['val'])
		return false;

		$.ajax({   
				  
					type: "POST",  
					url: "server.php",  
					cache:false,  
					data: data,
					dataType: "json",				
					success: function(response)  
					{   
						//$("#loading").hide();
						if(!response.error) {
							$("#msg").removeClass('alert-danger');
							$("#msg").addClass('alert-success').html(response.msg);
						} else {
							$("#msg").removeClass('alert-success');
							$("#msg").addClass('alert-danger').html(response.msg);
						}
					}   
				});
	});
});

</script>

</body>
</html>