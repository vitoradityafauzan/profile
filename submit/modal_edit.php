<!--
Author : Aguzrybudy
Created : Selasa, 19-April-2016
Title : Crud Menggunakan Modal Bootsrap
-->
<?php
    include "dbconfig.php";
    $nik=$_GET['nik'];
    $modal=mysqli_query($conn,"SELECT * FROM biodata WHERE nik='$nik'");
    while($r=mysqli_fetch_array($modal)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Your Profile</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">

        		
                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="fname">First Name</label>
                    <input type="hidden" name="nik"  class="form-control" value="<?php echo $r['nik']; ?>" />
                    <input type="text" name="fname"  class="form-control" value="<?php echo $r['fname']; ?>"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname"  class="form-control" value="<?php echo $r['lname']; ?>"/>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                    <label for="email">Email</label>
                    <input type="email" name="email"  class="form-control" value="<?php echo $r['email']; ?>"/>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone"  class="form-control" value="<?php echo $r['phone']; ?>"/>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                    <label for="position">Position</label>
                    <input type="text" name="position"  class="form-control" value="<?php echo $r['position']; ?>"/>
                </div>

                 <div class="form-group">
                            <label for="division"> Select Divison : </label>
                            <select class="form-control" name="division" id="division">
                                <option>IT Support</option>
                                <option>IT Infrastruktur</option>
                                <option>IT Electronic Data Processing</option>
                                <option>IT Solution</option>
                            </select>
                        </div>

	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Confirm
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>

             <?php } ?>

            </div>

           
        </div>
    </div>