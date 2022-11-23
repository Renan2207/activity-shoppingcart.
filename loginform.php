<?php 
	if (isset($_POST['btnLogin'])) {
		
		$username = htmlspecialchars($_POST['txtUsername']);
		$password = htmlspecialchars($_POST['txtPassword']);

		require_once('open_connection.php');
		$strSql = "
					SELECT * FROM user
					WHERE username = '$username'
					AND password = '$password'
				";

			if ($rsLogin = mysqli_query($con, $strSql)) {
				if (mysqli_num_rows($rsLogin) > 0) {
					header("location: confirm.php");
					mysqli_free_result($rsLogin);
				}
			else
				echo 'Invalid Username/Password!';	
			}
			else
				echo 'ERROR: Could now execute yout request.';

		require_once('close_connection.php');							
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<title>Log In</title>
</head>
	<body>
	    <div class="container" style="margin-top:40px">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<form role="form" action="#" method="POST">
								<fieldset>
									<div class="row">
										<div class="center-block" align="center">
											<img class="profile-img" src="img/photo.png">
										</div>
									</div><br>
									<div class="row">
										<div class="col-sm-12 col-md-10  col-md-offset-1 ">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="glyphicon glyphicon-user"></i>
													</span> 
													<input class="form-control" placeholder="Username" name="txtUsername" type="text" autofocus>
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="glyphicon glyphicon-lock"></i>
													</span>
													<input class="form-control" placeholder="Password" name="txtPassword" type="password" value="">
												</div>
											</div>
											<div class="form-group">
												<input type="submit" name="btnLogin" class="btn btn-lg btn-success btn-block" value="Log in">
											</div>
										</div>
									</div>
								</fieldset>
							</form>
						</div>
	                </div>
				</div>
			</div>
		</div>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	</body>
</html>