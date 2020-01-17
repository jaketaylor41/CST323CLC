<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<div class="container">
	<h2>Calculate Hours</h2>

	<form action="processCalculate" method="POST">
		<input type="hidden" name="_token" value="<?php echo csrf_token()?>" />

		<div class="form-group">
			<label for="title">Title</label> 
			<input type="text" class="form-control" id="title" placeholder="Title" name="title">
		</div>

		<div class="form-group">
			<label for="years">Years</label> 
			<input type="text" class="form-control" id="years" placeholder="Years" name="years">
		</div>
		
		<div class="form-group">
			<label for="months">Months</label> 
			<input type="text" class="form-control" id="months" placeholder="Months" name="months">
		</div>
		
		<div class="form-group">
			<label for="days">Days</label> 
			<input type="text" class="form-control" id="days" placeholder="Days" name="days">
		</div>
		
		<div class="form-group">
			<label for="hours">Hours</label> 
			<input type="text" class="form-control" id="hours" placeholder="Hours" name="hours">
		</div>

		<button type="submit" class="btn btn-dark">Submit</button>

	</form>

</div>