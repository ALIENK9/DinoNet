<?php
	include_once ($_SERVER['DOCUMENT_ROOT'] ."/connect.php");
	include_once ($_SERVER['DOCUMENT_ROOT'] ."/classi/UserAdmin.php");	

	session_start();
	
	if(isset($_SESSION['user'])){	
		session_unset();
	}

	if(isset($_POST['email']) && isset($_POST["password"])){
		session_unset();
		if(User::login($_POST["email"],$_POST["password"],'1')){
			$_SESSION['user'] = new UserAdmin($_POST['email']);
			header("Location: panel.php");
		}	
	}

?>

<!DOCTYPE html>
<html xml:lang="it-IT" lang="it-IT">
<head>
	<title>TecWeb</title>
	<meta name="description" content="Descrizione">
	<meta name="author" content="Alessandro Zangari, Cristiano Tessarolo, Matteo Rizzo">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/index.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<!-- Body -->

<body>


<div id="main" class="main">

<!-- Header -->

<header id="header-home" class="parallax padding-6">

	<div class="content">

		<div id="title-card" class="content card">
			<h1 class="title wide"> Accesso al pannello di amministrazione </h1>
		</div>
		
		<!-- Login -->

		<div id="login">
				<div class="card colored wrap-padding">
					<h1 xml:lang="en" lang="en">Login</h1>
					<hr>
					<form action="#" method="POST">
						<p><label for="input-email" xml:lang="en" lang="en">email</label></p>
						<input id="input-email" type="text" placeholder="email" name="email" value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>">
						<p><label for="input-passw" xml:lang="en" lang="en">password</label></p>
						<input id="input-passw" type="password" placeholder="password" name="password" >
						<br><br>
						<input type="submit" value="ACCEDI" class="card btn wide text-colored white">
					</form>
				</div>
			</div>
		<!-- /Login -->
	</div>
</header>

<!-- /Header -->
</div>

</body>

<!-- /Body -->

</html>
