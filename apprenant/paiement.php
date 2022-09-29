<?php 
session_start();
include_once '../connection.php';
$formation ="";

if(empty($_SESSION['username'])){
    echo "<script>window.location.assign('../login.php')</script>";
}else{
    if(isset($_GET['id'])){
        $_SESSION['formation_id'] = $_GET['id'];
        $abouts = $db->query("SELECT * FROM formations WHERE id = '". $_GET['id']."' ");
    }else{
        $abouts =Array();
    }
}

$name = $_SESSION['username'];
$text2 ="";
$text3 ="";
$student = "";
$stores = $db->query("SELECT * from users WHERE login = '$name' ");
foreach($stores as $store){
    $student = $store['id'];
}

if(isset($_POST['payer'])){
    $mode = $_POST['mode'];
    $tel = htmlentities($_POST['tel']);
    $nom = htmlentities($_POST['nom']);
    $formation = (int)$_SESSION['formation_id']; 

    $db->exec("INSERT INTO payment(id_student, id_formation, numero, nom_compte) VALUES('$student', '$formation', '$tel', '$nom')");
    unset($_SESSION['formation_id']);

    echo "<script>window.location.assign('formations.php')</script>";
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
    <link rel="stylesheet" href="style1.css">
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
                <li class="side-instructors" onclick="window.location.assign('formateurs.php')">
                    <a><span class="las la-chalkboard-teacher"></span>
                               <span>Formateurs</span>
                    </a>
                </li>
                <li class="side-formations" onclick="window.location.assign('formations.php')">
                    <a  class="active"><span class="las la-chalkboard"></span>
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
                <li class="side-formations"  onclick="window.location.assign('class.php')">
                    <a class="active"><span class="las la-chalkboard"></span>
                               <span>Class</span>
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
            <?php $memorises = $db->query("SELECT * from users WHERE login = '$name' ");
            
            foreach($memorises as $memorise){
            if(empty($memorise['photo'])){ 
                echo "<img src='../img/choco.jpg' alt='' width='40px' height='40px'>";
                    } else{
                echo "<img src='../".$memorise['photo']."' alt='' width='40px' height='40px'>";
            } 
            }?>
                <div>
                    <h4><?= $name; ?></h4>
                    <small>Apprenant(e)</small>
                </div>
            </div>
        </header>
        <main class="add-students">
            <div class="add-instructors-head">
                <button style="background-color:blue; border:none; color:white; width:120px; font-size:20px; border-radius:5px" onclick="window.history.go(-1)"><i class="las la-arrow-left"></i><span>Retour</span></button>
                <span class="instructors-title">Formulaire de paiement</span>
            </div>
            <div class="wrapper">
                <form class="paid-form" method="post" action="paiement.php" enctype='multipart/form-data'>
                    <span style="color:red"><?= $text2; ?></span>
                    <span style="color:green"><?= $text3; ?></span>
                    <?php foreach($abouts as $about){ ?>
                        <div class="no-field">
                            <p>Formation: <span style="font-weight:bold"><?= $about['libelle'] ?></span></p>
                            <p>Prix: <span style="font-weight:bold"><?= $about['prix'] ?> XAF</span></p>
                        </div>
                    <?php } ?>
                    <div class="input-field">
                        <p style="margin-bottom:10px">Selectionnez la méthode de paiement:</p>
                        <div class="select-mode">
                            <div class="option">
                                <input type="radio" id="om" name="mode" value="om"
                                        checked>
                                <label for="om">
                                    <div class="logo">
                                        <img src="../img/orange.jpg" alt="" width="50px"> 
                                        <span>Orange Money </span>  
                                    </div>
                                </label>
                            </div>

                            <div class="option">
                                <input type="radio" id="momo" name="mode" value="momo">
                                <label for="momo">
                                    <div class="logo">
                                        <img src="../img/mobile.png" alt="" width="50px"> 
                                        <span>Mobile Money </span>  
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-field">
                            <label for="tel">Numéro du compte</label>
                            <input type="tel" name="tel" class="form-control" required>
                        </div>
                        <div class="input-field">
                            <label for="nom">Nom du compte</label>
                            <input type="text" name="nom" class="form-control" required>
                        </div>
                    </div>
                    <button class="" type="submit" name="payer">Payer</button>
                </form>
            </div>
        </main>
        