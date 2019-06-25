<!DOCTYPE html>
<html lang="en">
   <head>
	<title>Staff Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/styleEditor.css">
	  
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-grid.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-grid.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-reboot.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet">
	
	<script src="bootstrap/js/bootstrap.bundle.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-1.11.1.min.js"></script> 
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
	
   </head>
   <body>
	  <div class="frame">
		 <img class="logo" src="images/logo.png"><br>
		 <button class="button button1" href="">Home</button>
		 <button class="button button2" onclick="openProfile()">My Profile</button>
		 <a href="staffProfile.php"><button class="button button3" >Change Password</button></a>
		 <button class="button button4" href="">Complaints</button>
		 <button class="button button5" href="">Report Feedback</button>
		 <button class="button button6" href="">Logout</button>
	  </div>

		<!-- Modal -->
		<div class="modal fade" id="complaints" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">My Profile</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
			  
				<form action="" method="get" id="form" enctype="multipart/form-data"  class="form-horizontal">
					<input type="hidden" value="" name="">

					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Staff ID</label>
							<div class="col-md-9">
							<input type="text" name="" class="form-control" disabled="">
							</div>
						</div>
					</div>

					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Full Name</label>
							<div class="col-md-9">
							<input type="text" name="" class="form-control" disabled="">
							</div>
						</div>
					</div>

					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Position</label>
							<div class="col-md-9">
							<input type="text" name="" class="form-control" disabled="">
							</div>
						</div>
					</div>
					
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Question</label>
							<div class="col-md-9">
							<input type="text" name="" class="form-control" disabled="">
							</div>
						</div>
					</div>
					
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">Answer</label>
							<div class="col-md-9">
							<input type="text" name="" class="form-control" disabled="">
							</div>
						</div>
					</div>
				</form>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="updateProfile()">Update Profile</button>
			  </div>
			</div>
		  </div>
		</div>
   </body>
   
   <script type="text/javascript">
		function openProfile(){
			$('#exampleModal').modal();
		}
   </script>
		
   <script type="text/javascript">
		function updateProfile(){
			$('#updateModal').modal();
		}
   </script>
   
   <script type="text/javascript">
		$(document).ready(function(){
			$("#dropdown-toggle").dropdown();
		});  
	</script>
</html>