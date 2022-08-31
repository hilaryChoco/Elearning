<?php include_once '../connection.php';
session_start(); 
$text = '';
$text1 = "";
$text2 ="";
$text3 ="";
$new_path = "";


if(isset($_POST['enregistrer'])){
    $nom = strtolower(htmlentities($_POST['firstname']));
    $prenom = strtolower(htmlentities($_POST['lastname']));
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
    $sex = $_POST['sex'];
    $address = htmlentities($_POST['address']);
    $city = $_POST['city'];
    $grade = htmlentities($_POST['grade']);
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['password']);
    $naissance = $_POST['naissance'];

    $verify = $db->query("SELECT * FROM users WHERE nom = '$nom' AND prenom ='$prenom' AND role = 'teacher' ") or die(print_r($db->errorInfo()));
    if($verify->fetchColumn() > 0){
        $text = "Un compte avec ces informations existe déja";
    }else{
        $verify1 = $db->query("SELECT * FROM users WHERE login = '$username' ");
        if($verify1->fetchColumn() > 0){
            $text = "Ce username est déja utilisé";
        }else{
            $text1 = "Formateur enregistré avec succès";
            $db->query("INSERT INTO users(nom, prenom, sex, email, phone, quartier, ville, login, password, role, grade, date_naissance) VALUES('$nom', '$prenom', '$sex', '$email', '$phone', '$address', '$city', '$username', '$password', 'teacher', '$grade', '$naissance') ");
            $db->query("INSERT INTO allusers(nom, prenom, sex, email, phone, quartier, ville, login, password, role, grade, date_naissance) VALUES('$nom', '$prenom', '$sex', '$email', '$phone', '$address', '$city', '$username', '$password', 'teacher', '$grade', '$naissance') ");
        }

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
                <p>Gestion des utilisateurs</p>
                <li class="side-instructors" onclick="window.location.assign('formateurs.php')">
                    <a class="active"><span class="las la-chalkboard-teacher"></span>
                               <span>Formateurs</span>
                    </a>
                </li>
                <li class="side-students" onclick="window.location.assign('apprenants.php')">
                    <a><span class="las la-book-reader"></span>
                               <span>Apprenants</span>
                    </a>
                </li>
                <p>Autres menus</p>
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
                <li class="side-activities" onclick="window.location.assign('activites.php')">
                    <a><span class="las la-tasks"></span>
                               <span>Activités</span>
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
                <img src="../img/choco.jpg" alt="" width="40px" height="40px">
                <div>
                    <h4><?= $_SESSION["username"] ?></h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>

        
        <main class="add-instructors">
            <div class="add-instructors-head">
                <button class="back side-back"  onclick="window.location.assign('formateurs.php')"><i class="las la-arrow-left"></i><span>Retour</span></button>
                <span class="instructors-title">Ajout d'Un Formateur</span>
            </div>
            <div class="wrapper">
                <form class="form" method="post" action="addteacher.php">
                    <span style="color:red"><?= $text; ?></span>
                    <span style="color:green"><?= $text1; ?></span>
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
                            <label for="grade">Grade</label>
                            <input type="text" name="grade" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="input-field">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="naissance">Date de naissance</label>
                            <input type="date" name="naissance" class="form-control" required>
                        </div>
                        <div class="input-field">
                            <label for="presentation">Petite Description</label>
                            <textarea name="presentation" id="presentation" cols="35" rows="5"></textarea>
                        </div>
                    </div>
                    <button class="" type="submit" name="enregistrer">Enregistrer</button>
                </form>
            </div>