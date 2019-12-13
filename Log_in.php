<!DOCTYPE html>
<html>

<head>
  <style>

  </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>GarmentsERP</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body style="background-image: url('login.jpg')";>
    <div class="wrapper">
        <div id="content">
        	<center>

				<br><br>
				<h2 style="background-color:#c2115e">Merchandiser Log In Here</h2>
				<br><br>
				<br><br>
			<form style=" width: 700px; height: 400px;" action="authentication.php" method="POST">
				<div class="row" style="padding: 20px;">
					<div class="col">
                        <input type="text" class="form-control" placeholder="Enter Your Username" name="uname">
                    </div>
				</div>	
			  <br>
				<div class="row" style="padding: 20px;">
				  	<div class="col" >
	                    <input type="password" class="form-control" placeholder="Enter Your password" name="pass">
	                    <small id="passwordHelpInline" class="text-muted" style="padding: 20px;">
					      Must be 4-16 characters long.
					    </small>
					</div>
				</div>
				<button type="submit" class="btn btn-primary mb-2">Log In</button>
			</form>
			</center>
		</div>
	</div>
</body>
</html>