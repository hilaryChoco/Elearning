<?php include_once '../connection.php'; 
    session_start();
    if(isset($_GET['formationid']) ){
        $db->exec("DELETE FROM formations WHERE id='" . $_GET["formationid"] . "'");
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
                    <a><span class="las la-book-reader"></span>
                               <span>Apprenants</span>
                    </a>
                </li>
                <p>Autres</p>
                <li class="side-formations"  onclick="window.location.assign('formations.php')">
                    <a class="active"><span class="las la-chalkboard"></span>
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
        <main class="formations">
            <div class="add-instructors-head">
                <button class="back side-back4" onclick="window.location.assign('addformations.php')"><i class="las la-plus"></i><span>Nouvelle Formation</span></button>
                <span class="instructors-title">Liste Des Formations</span>
            </div>
            <div class="formations-body">
                <?php  $formations = $db->query("SELECT * FROM formations");
                    foreach($formations as $formation){
                ?>
                <div class="formations-card">
                   <?php echo "<img src='../".$formation['photo']."' alt='' width='285px' height='160px'>"; ?>
                    <p><?= $formation['libelle']; ?></p>
                    <span class="price"><?= $formation['prix']; ?> XAF</span>
                    <span class="createdAt"><u style="text-decoration:underline">Date création:</u><?= $formation['date_creation']; ?></span>
                    <span class="autor"><u style="text-decoration:underline">Auteur:</u> <?= $formation['cree_par']; ?></span>
                    <span style="text-transform:capitalize; margin-top:10px"><u style="font-weight:bold">Type: </u>  <?= $formation['type'] ?></span>
                    <div class="operations">
                        <a href="formations_view.php?id=<?= $formation['id']; ?>"><i style="color:black" class="las la-eye"></i></a>
                        <i class="las la-pen"></i>
                        <a href="formations.php?formationid=<?= $formation['id']; ?>"><i class="las la-trash-alt"></i></a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </main>
