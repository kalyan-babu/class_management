<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>	
<script src="bootstrap/js/bootstrap.min.js"></script>

<style>
#label
{
	font-weight:bold;
}

</style>

</head>

<body>
<div class="container">
<div class="row">
		  <div class="col-sm-4">
		  </div>
		  <div class="col-sm-6">
		 <div align="center"><br><br><br><br>
			<p>topper list form</p>
			</div>
			<br>
			  <form class="form-horizontal" action="topper.php" method="post">
					<div class="form-group">
						<label class="control-label col-sm-2" for="email" id="label">School_Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="school_name" placeholder="Enter School Name" name="school_name">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pwd" id="label">Class_Id:</label>
						<div class="col-sm-10">          
							<input type="text" class="form-control" id="class_id" placeholder="Enter class_id" name="class_id">
						</div>
					</div>
					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" >toppers_list:</button>
						</div>
					</div>
			</form>
		  </div>
    </div>
	
	<br><br><br><br>
	<div align="center">
	 <form class="form-horizontal" action="main_page.php" method="post">
	 <div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default" >go to main_page</button>
						</div>
					</div>
	</form>
	</div>
	</div>
	 <div class="col-sm-2">
	  </div>
	
	
	
</div>

</body>

</html>