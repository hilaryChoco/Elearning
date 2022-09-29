<?php 
session_start();

include_once '../connection.php';
$name = $_SESSION['username'];
$memorises = $db->query("SELECT * from users WHERE login = '$name' ");
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
                <li class="side-formations"  onclick="window.location.assign('class.php')">
                    <a class="active"><span class="las la-chalkboard"></span>
                               <span>Class</span>
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
        <main class="formations">
            <div class="formations-body">
                <div style="margin-bottom:50px">
                    <h1 style="text-align:center">Mes Formations</h1>
                    <?php 
                    $myformations = $db->query("SELECT * from payment INNER JOIN formations ON payment.id_formation = formations.id where id_student='$id' ");
                    
                    foreach($myformations as $myformation){
                        $count1 = $myformation['id'];
                    ?>
                        <div class="formations-card">
                        <?php echo "<img src='../".$myformation['photo']."' alt='' width='280px' height='160px'>"; ?>
                            <p style="text-transform:capitalize"><?= $myformation['libelle']; ?></p>
                            <div class="actions">
                                <button onclick='window.location.assign("formations_view.php?id=<?= $count1 ?>")' style="margin-left:10px" class="buy">Continuer la formation</button>
                            </div>     
                        </div>
                    <?php } ?>
                </div>


                <div>
                    <h1 style="text-align:center">Autres Formations</h1>
                    <?php  $formations = $db->query("SELECT * FROM formations WHERE formations.id NOT IN (SELECT id_formation FROM payment) ");
                    
                        foreach($formations as $formation){
                            $count2 = $formation['id'];
                    ?>
                    <div class="formations-card">
                    <?php echo "<img src='../".$formation['photo']."' alt='' width='280px' height='160px'>"; ?>
                        <p style="text-transform:capitalize"><?= $formation['libelle']; ?></p>
                        <div class="infos">
                            <span><?= $formation['prix'] ?> XAF</span>
                            <?php $studnumbers1 = $db->query("SELECT COUNT(*) FROM formations_students WHERE id_formation ='$count2' ");
                            foreach($studnumbers1 as $studnumber1){ ?>
                                <span style="margin-left:23px">
                                    <?php if($studnumber1[0] < 10){
                                                echo "0". $studnumber1[0]." Apprenants";
                                        }else{ 
                                            echo $studnumber1[0]. " Apprenants";
                                            }
                                    ?>
                                </span>
                            <?php } ?> 
                        </div> 
                        <div class="actions">
                            <button onclick='window.location.assign("../formation_view.php?id=<?= $count2 ?>")' class="details"> Details</button>
                            <button onclick='window.location.assign("paiement.php?id=<?= $count2 ?>")' style="margin-left:10px" class="buy">Commencer la formation</button>
                        </div>     
                    </div>
                    <?php } ?>
                </div>  
            </div>
        </main>


        