<?php  
session_start();

include_once 'connection.php'; ?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css\bootstrap.css" rel="stylesheet">  
		<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Wise-Learn</title>
	</head>
	<body>

		<!-- Top navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
        <div class="container-fluid">
          <div class="navbar-brand text-dark fs-3 fw-bold" onclick='window.location.assign("index.php")'><img src="img/wise.jpg" alt="" width="40px"> WISE TRAINING</div>
          <!-- Ceci correspond au bouton menu qui s'affiche lorsque l'écran est réduit -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Accueil</a>
              </li>
              <li class="nav-item dropdown drop1">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Formations</a>
                <ul class="dropdown-menu menu1" aria-labelledby="navbarDropdown">

                    <li class="nav-item dropdown drop2">
                      <a class="dropdown-toggle" href="formationss.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Formations Spécialisées</a>
                      <ul class="dropdown-menu menu2" aria-labelledby="navbarDropdown">
                        <!-- Sous menu dans un menu -->
                        <?php $specials = $db->query("SELECT * FROM formations WHERE type='personnalisee' ");
                        foreach($specials as $special){ ?>
                        <li><a class="dropdown-item" href="formation_view.php?id=<?= $special['id']; ?>"><?= $special['libelle']; ?></a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <?php } ?>
                      </ul>
                    </li>

                  <li><hr class="dropdown-divider"></li>

                    <li class="nav-item dropdown drop2">
                      <a class="dropdown-toggle" href="formationsp.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Formations Grand Public</a>
                      <ul class="dropdown-menu menu2" aria-labelledby="navbarDropdown">
                        <!-- Sous menu dans un menu -->
                        <?php $publics = $db->query("SELECT * FROM formations WHERE type='public' ");
                        foreach($publics as $public){ ?>
                        <li><a class="dropdown-item" href="formation_view.php?id=<?= $public['id']; ?>"><?= $public['libelle']; ?></a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <?php } ?>
                      </ul>
                    </li>

                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
              <li class="nav-item dropdown drop1">
                <a class="nav-link dropdown-toggle dropbtn" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Entreprise</a>
                <ul class="dropdown-menu menu1" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="https://www.wisedecisions.cm/">Site Web</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="equipe.php">Equipes</a></li>
                </ul>
              </li>
             </ul> 

             <?php  if(empty($_SESSION['username'])){
               ?>
          <button class="btn btn-warning fw-bold" style="margin-right: 5px;" onclick="window.location='register.php'">S'enregistrer</button>
          <button class="btn text-white fw-bold" style="background-color: #ff9933; border-color: #ff9933;" onclick="window.location='login.php'">Connexion</button>
            <?php } else{
              $name = $_SESSION['username'];
            $memorises = $db->query("SELECT * from users WHERE login = '$name' ");
            
            foreach($memorises as $memorise){
            if(empty($memorise['photo']) AND $memorise['role'] == 'student'){ ?>
                <img  class="mon_image" src='img/avatar.png' alt='' width='40px' height='40px' onclick="window.location.assign('apprenant/index.php')">
                   <?php  } 
                   elseif(!empty($memorise['photo']) AND $memorise['role'] == 'student'){ ?>
                <img class="mon_image" src=<?= $memorise['photo'] ?> alt='' width='40px' height='40px' onclick="window.location.assign('apprenant/index.php')">
             <?php } 
             elseif(empty($memorise['photo']) AND $memorise['role'] == 'teacher'){ ?>
              <img class="mon_image" src='img/avatar.png' alt='' width='40px' height='40px' onclick="window.location.assign('formateur/index.php')">
                 <?php  } 
                 elseif(!empty($memorise['photo']) AND $memorise['role'] == 'teacher'){ ?>
              <img class="mon_image" src=<?= $memorise['photo'] ?> alt='' width='40px' height='40px' onclick="window.location.assign('formateur/index.php')">
              <?php  }
              elseif(empty($memorise['photo']) AND $memorise['role'] == 'admin'){ ?>
              <img class="mon_image" src='img/avatar.png' alt='' width='40px' height='40px' onclick="window.location.assign('admin/index.php')">
                 <?php  } 
                 elseif(!empty($memorise['photo']) AND $memorise['role'] == 'admin'){ ?>
              <img class="mon_image" src=<?= $memorise['photo'] ?> alt='' width='40px' height='40px' onclick="window.location.assign('admin/index.php')">
            <?php       } }?>

            <button class="btn text-white fw-bold" style="background-color: #ff9933; border-color: #ff9933;" onclick="window.location='deconnexion.php'">Deconnexion</button>
            <?php    }  ?>
          </div>
        </div>
      </nav>