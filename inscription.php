// Conection BDD

<?php 
try {
	$bddUser = new PDO('mysql:host=localhost;dbname=clone_netflix;charset-utf8','root','');
} catch(Exception $e) {
	die('Erreur : '.$e->getMessage());
}
?>

// Création d'une session
<?php 
session_start();
// Vérification et récupération des infos du form
if(isset($_POST['submit'])) {
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$confirm_password = htmlspecialchars($_POST['password_two']);


	//vérif syntaxe email
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	header('location: inscription.php?error=1&message=Votre adresse email est invalide.');
	exit();
}

if($password === $confirm_password){
	
}
} else {
    // Le formulaire n'a pas été soumis
    echo "Le formulaire n'a pas été soumis.";
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Netflix</title>
	<link rel="stylesheet" type="text/css" href="design/default.css">
	<link rel="icon" type="image/pngn" href="img/favicon.png">
</head>
<body>

	<?php include('src/header.php'); ?>
	
	<section>
		<div id="login-body">
			<h1>S'inscrire</h1>

			<form method="post" action="inscription.php">
				<input type="email" name="email" placeholder="Votre adresse email" required />
				<input type="password" name="password" placeholder="Mot de passe" required />
				<input type="password" name="password_two" placeholder="Retapez votre mot de passe" required />
				<button type="submit">S'inscrire</button>
			</form>

			<p class="grey">Déjà sur Netflix ? <a href="index.php">Connectez-vous</a>.</p>
		</div>
	</section>

	<?php include('src/footer.php'); ?>
</body>
</html>