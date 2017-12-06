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
	<div id="title-card" class="content card">
		<h1 class="title wide"> Accesso al pannello di amministrazione </h1>
	</div>
	
	<!-- Login -->

	<div id="login" class="content padding-6">
		<div class="card green-sea wrap-padding">
			<h1 xml:lang="en-EN" lang="en-EN">Login</h1>
			<hr>
			<form action="panel.php" method="POST">
				<label xml:lang="en-EN" lang="en-EN"><p>email</p></label>
				<input type="text" placeholder="email" name="email">
				<label xml:lang="en-EN" lang="en-EN"><p>password</p></label>
				<input type="password" placeholder="password"  name="password">
				<br><br>
				<input type="submit" value="ACCEDI" class="card btn wide text-green-sea white">
			</form>
		</div>
	</div>

	<!-- /Login -->

</header>

<!-- /Header -->
</div>

</body>

<!-- /Body -->

</html>
