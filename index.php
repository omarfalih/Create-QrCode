<!DOCTYPE html>
<html>
<head>
	<title>Test QrCode</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/myStyle.css">
</head>
<body>
	
	<div class="container">
		<form action="processing.php" method="POST">
			<h1 class="header text-center">Welcome to Create  QrCode</h1>

			<div class="form-group">
			    <label for="InputNumber">Enter Number </label>
			    <input type="text" name="number" class="form-control" id="InputNumber" aria-describedby="emailHelp" placeholder="Enter Number">	   
			</div>

		  	<button type="submit" class="btn btn-primary">Create QrCode</button>
		</form>
	</div>

	<br><br>

	<div class="container">
		<a href="https://tcpdf.org">User librar TCPDF</a>
	</div>
	
</body>
</html>