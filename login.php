
<?php 
session_start();
include_once 'header.php';
require "connection.php";
$text = "";
$login="";
$_SESSION["username"] = "";

if(isset($_POST['connect'])){
	$login = htmlentities($_POST['login']);
	$password = htmlentities($_POST['password']);

	$logins = $db->query("SELECT * FROM users WHERE login = '$login' AND password = '$password' ") or  die(print_r($db->errorInfo()));

	if($logins->fetchColumn() > 0){
		$_SESSION["username"] = $login;
		$username = $_SESSION["username"] ;

		$roles = $db->query("SELECT * FROM users WHERE login ='$username' ");
		$_SESSION['name'] = "";
		foreach($roles as $role){
			$_SESSION['name'] = $role['nom'] ." ". $role['prenom'];
			$_SESSION['photo'] = $role['photo'];
			$_SESSION['email'] = $role['email'];
			$_SESSION['user_id'] = $role['id'];

			if($role['role'] == "student"){
				echo "<script> window.location.assign('apprenant/index.php');</script>";
			}elseif($role['role'] ==
			 "teacher"){
				echo "<script> window.location.assign('formateur/index.php'); </script>";
			}
			else{
				echo "<script> window.location.assign('admin/index.php');</script>";
			}
		}
    }else{
		$text = "Aucun compte ne comporte ces informations.";
	}
}

?>


	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/learn.png" alt="ok">
				</div>

				<form class="login-form" action="login.php" method="post" >
					<span class="login100-form-title">Connexion</span>
					<span style="color:red"><?= "$text"; ?></span><br>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="login" placeholder="username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-sign-in" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<input type="submit" class="btn btn-warning fw-bold mx-5 text-white h-5" value="connexion" name="connect">

					<div class="text-center p-t-12" onclick='reset()'>
						<a class="txt2" href="#">
							Login / mot de passe
						</a>
						<span class="txt1">
							Oublié?
						</span>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Créez votre compte
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>


				<form class="login100-form reset-form validate-form" action="login.php" method="post" style="display:none">
					<span class="login100-form-title">
						Récupération de mot de passe 
					</span>

					<span style="color:red"><?= $text; ?></span><br>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="login" placeholder="Adresse Email" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						</span>
					</div>
					<button class="login100-form-btn" type="submit" name="recuperation">
							Envoyer
						</button>

					<div class="text-center p-t-12" onclick='login()'>
						<a class="txt2" href="#">
							Retour à la page de connexion
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="register.php">
							Créez votre compte
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})


		function reset(){
			$(".login-form").css("display", "none");
			$(".reset-form").css("display", "block");
		}
		function login(){
			$(".reset-form").css("display", "none");
			$(".login-form").css("display", "block");
		}
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<?php include_once 'footer.php'; ?>
</body>
</html>