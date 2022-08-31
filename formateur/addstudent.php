<?php include_once '../connection.php'; 
session_start();
$text = '';
$text1 = "";
$text2 ="";
$text3 ="";
$new_path = "";


if(isset($_POST['save'])){
    $nom = strtolower(htmlentities($_POST['firstname']));
    $prenom = strtolower(htmlentities($_POST['lastname']));
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
    $quartier = htmlentities($_POST['address']);
    $sex = $_POST['sex'];
    $login = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    $password1 = htmlentities($_POST['password1']);
    $date = $_POST['naissance'];
    $ville = htmlentities($_POST['city']);
    $fname = $_FILES['photo']["name"];
	$ext = explode(".",$fname)[1];
	$ext = strtolower($ext);
	$file_tmp = $_FILES['photo']['tmp_name'];
	$all_extensions = Array("png","jpg","jpeg","webp","svg");
	$path="../img/".$fname;
	
    $regist = $db->query('SELECT * from users WHERE nom="$nom" AND prenom="$prenom" AND role="student"') or die(print_r($db->errorInfo()));
    if($regist->fetchColumn() > 0){
        $text2 = "Un compte avec ces informations existe déja";
    }elseif($password != $password1){
        $text2 = "Les mots de passe ne sont pas identiques";
    }
    else{
        if(in_array($ext,$all_extensions)){
            move_uploaded_file($file_tmp,$path);
            if(rename("../img/".$fname, "../img/".$nom.".".$ext)){
            $new_path = "img/".$nom.".".$ext;
            }
        }
        
        $db->exec("INSERT INTO users(nom, prenom, sex, phone, email, quartier, ville, login, password, date_naissance, role, photo) VALUES('$nom', '$prenom', '$sex', '$phone', '$email', '$quartier', '$ville', '$login', '$password', '$date', 'student', '$new_path')");
        $db->exec("INSERT INTO allusers(nom, prenom, sex, phone, email, quartier, ville, login, password, date_naissance, role, photo) VALUES('$nom', '$prenom', '$sex', '$phone', '$email', '$quartier', '$ville', '$login', '$password', '$date', 'student', '$new_path')");

        $text3 = "Compte crée avec succès";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WISE</title>
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
            <span><img src="../img/wise.jpg"  width="40px" ></span><span onclick="window.location.assign('../index.php')">WISE TRAINING</span>
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li class="side-dashboard" onclick="window.location.assign('index.php')">
                    <a><span class="las la-igloo"></span>
                               <span>Dashboard</span>
                    </a>
                </li>
                <p>Gestion des apprenants</p>
                <li class="side-students" onclick="window.location.assign('apprenants.php')">
                    <a class="active"><span class="las la-book-reader"></span>
                               <span>Apprenants</span>
                    </a>
                </li>
                <p>Autres</p>
                <li class="side-formations"  onclick="window.location.assign('formations.php')">
                    <a><span class="las la-chalkboard"></span>
                               <span>Formations</span>
                    </a>
                </li>
                <li class="side-messages" onclick="window.location.assign('messages.php')">
                    <a><span class="las la-sms"></span>
                               <span>Message</span>
                    </a>
                </li>
                <li class="side-forums" onclick="window.location.assign('forums.php')">
                    <a><span class="lab la-rocketchat"></span>
                               <span>Forums</span>
                    </a>
                </li>
                <li class="side-notifications" onclick="window.location.assign('programmes.php')">
                    <a><span class="las la-tasks"></span>
                               <span>Programmes</span>
                    </a>
                </li>
                <p>Personnel</p>
                <li class="side-account" onclick="window.location.assign('compte.php')">
                    <a><span class="las la-user-circle"></span>
                               <span>Mon Compte</span>
                    </a>
                </li>
                <li class="side-account" onclick="window.location.assign('../deconnexion.php')">
                    <a><span class="las la-user-circle"></span>
                               <span>Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="header-title">
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>
                        Dashboard
                    </label>
                </h2>
            </div>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" name="" id="" placeholder="">
            </div>

            <div class="user-wrapper">
                <?php  if(empty($_SESSION['photo'])){
                    echo "<img src='../img/avatar.png' alt='' width='40px' height='40px'>";
                }else{
                    ?>  
                   <img src='<?= $_SESSION["photo"] ?>' alt='' width='40px' height='40px'>
                <?php } ?>
                <div>
                    <h4><?= $_SESSION["username"] ?></h4>
                    <small>Formateur</small>
                </div>
            </div>
        </header>
        <main class="add-students">
            <div class="add-instructors-head">
                <button class="back side-back4" onclick="window.location.assign('apprenants.php')"><i class="las la-arrow-left"></i><span>Retour</span></button>
                <span class="instructors-title">Ajout d'Un Apprenant</span>
            </div>
            <div class="wrapper">
                <form class="form" method="post" action="addstudent.php" enctype='multipart/form-data'>
                    <span style="color:red"><?= $text2; ?></span>
                    <span style="color:green"><?= $text3; ?></span>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="lastname">Prénom</label>
                            <input type="text" name="lastname" class="form-control" required>
                        </div>
                        <div class="input-field">
                            <label for="firstname">Nom</label>
                            <input type="text" name="firstname" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="input-field">
                            <label for="phone">Telephone</label>
                            <input type="tel" name="phone" class="form-control" maxlength="9" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="sex">Sex</label>
                            <select name="sex" id="sex" class="form-control" required>
                                <option value="feminin">Feminin</option>
                                <option value="masculin">Masculin</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="address">Adresse</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="city">Ville</label>
                            <select name="city" id="city" class="form-control" required>
                                <option value="douala">Douala</option>
                                <option value="yaounde">Yaounde</option>
                                <option value="bertoua">Bertoua</option>
                                <option value="maroua">Maroua</option>
                                <option value="edea">Edea</option>
                                <option value="garoua">Garoua</option>
                                <option value="nkongsamba">Nkongsamba</option>
                                <option value="ebolowa">Ebolowa</option>
                                <option value="loum">Loum</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="input-field">
                            <label for="password">Confirmation de mot de passe</label>
                            <input type="password" name="password1" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="naissance">Date de naissance</label>
                            <input type="date" name="naissance" class="form-control" required>
                        </div>
                        <div class="input-field" style="width:400px">
                            <label for="photo">Photo</label>
                            <label for="photo">
                                <img src="../img/avatar.png" alt="">
                            <input type="file" id="photo" name="photo" hidden="" size=50 class="form-control">
                            </label>
                        </div>
                    </div>
                <button class="" type="submit" name="save">Enregistrer</button>
                </form>
            </div>
        </main>