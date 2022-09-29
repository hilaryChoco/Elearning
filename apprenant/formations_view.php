<?php 
session_start();
include_once '../connection.php';

$name = $_SESSION['username'];
$memorises = $db->query("SELECT * from users WHERE login = '$name' ");

    $id = "";
    if(isset($_GET['id']) ){
        if($_GET['id']!=""){
            $id1 = $id = $_GET['id'];
            $_SESSION['formation_id'] = $id;
            $n = $db->query("SELECT * FROM formations  WHERE id = '$id1' ") or die(print_r($db->errorInfo()));
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
                <li class="side-formations"  onclick="window.location.assign('class.php')">
                    <a class="active"><span class="las la-chalkboard"></span>
                               <span>Class</span>
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
            <?php $memorises = $db->query("SELECT * from users WHERE login = '$name' ");
            
            foreach($memorises as $memorise){
                $id = $memorise['id'];
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
        <main class="formation_view">
        <?php foreach($n as $key){ 
                $_SESSION['formationid'] = $key['id'];
            ?>

            <div class="formation_view_left">

                <div class="top_info">
                    <span style="text-transform:uppercase; font-weight: 600;"><?= $key['libelle'] ?></span>
                </div>

                <?php echo "<img src='../".$key['photo']."' alt='' width='300px' height='180px' style='margin-left: 10px; margin-bottom:5px'>"; ?>

                <p class="formation_description"><?= $key['description'] ?></p>
                <small style="margin-left:10px; margin-bottom:10px">Type de formation: <span style="font-weight:bold"><?= $key['type'] ?></span></small>
                <small style="margin-left:10px;margin-bottom:10px">Durée:<span style="font-weight:bold"><?= $key['duree'] ?></span> heure(s)</small>

                <small style="margin-left:10px; margin-bottom:10px">Date creation: <span style="font-weight:bold"><?= $key['date_creation'] ?></span></small>
                <small style="margin-left:10px; margin-bottom:30px">Auteur: <span style="font-weight:bold"><?= $key['cree_par'] ?></span></small>

            </div>

            <div class="formation_view_right">
                <div class="add-lessons">
                    <span style="font-size:20px; font-weight:bold">Cours de la formation</span>
                </div>

                <div class="lessons-body">
                    <?php 
                    $ref = $_SESSION['formationid'];
                    $lessons = $db->query("SELECT * FROM cours WHERE id_formation ='$ref' ");
                    foreach($lessons as $lesson){ ?>
                    <div class="lessons-card">
                       <?php echo "<embed src='../".$lesson['fichiers']."' width='190px' height='100px' type=''>"; ?>
                       <span style="margin-left:10px; margin-top:10px; margin-bottom:10px; font-weight:bold"><?= $lesson['libelle'].".".$lesson['ext'];?></span>
                        <div class="lesson_operations">
                            <a href="lesson_view.php?id=<?= $lesson['id']; ?>"><i style="color:black; font-size:20px" class="las la-eye"></i></a>
                        </div>
                    </div>
                        <?php } ?>
                </div>
            </div>

            <?php } ?>
        </main>


        