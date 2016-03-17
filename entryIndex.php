<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
		<link rel="stylesheet" href="css/sticky-footer-navbar.css" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<title>Maintainer Panel</title>
	</head>
	<body>
		<?php
		require_once ('navbar.php');
		?>
		<div class="container">
		
		<form action="<?php echo($_SERVER["PHP_SELF"]); ?>" method="POST" role="form" class="form-inline">
			<div class="row">
				
					<div class="form-group" style="padding: 15px;">
						 <label for="inputtext" class="col-md-2 control-label">Label</label>
					<input type="text" class="form-control col-md-8" name="inputtext" />
					</div>	
				</div>
				<div class="row">
				<div class="form-group col-md-2">
					<div class="input-group">
						<div class="input-group-addon">
							Ch
						</div>
						<input class="form-control" name="chapter" type="text" placeholder="Chapter Number" maxlength="3" required="">
					</div>
				</div>
				<div class="form-group col-md-2">
					<div class="input-group">
						<div class="input-group-addon">
							Pg
						</div>
						<input class="form-control" type="text" name="pagenum" placeholder="Page Number" maxlength="4" required="">
					</div>
				</div>

				<div class="form-group col-md-2">
					<div class="input-group">
						<div class="input-group-addon">
							Line
						</div>
						<input class="form-control" type="text" name="linenum" placeholder="Line Number" maxlength="2" required>
					</div>
				</div>
				</div>
				
				<div class="col-md-8" style="padding:0px;">
				<input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit"/>
				</div>

			</form>
			
		</div>

		<?php
		require_once ('footer.php');
		?>		
	</body>

</html>