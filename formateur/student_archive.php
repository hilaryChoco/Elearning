<?php include_once '../connection.php'; 
    session_start();
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
        <main class="archives1">
            <div class="add-instructors-head">
                <button class="back side-back2" onclick="window.location.assign('apprenants.php')"><i class="las la-arrow-left"></i><span>Retour</span></button>
                <span class="instructors-title">Archives des Apprenants</span>
            </div>
            <div class="table_responsive1">
                <table class="instructors-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Photo</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php 
                $i = 1;
            $studs = $db->query("SELECT * FROM allusers WHERE role = 'student'");
                foreach($studs as $stud){
            ?>

                        <tr>
                            <td><?= $i ?></td>
                            <?php  if(empty($stud['photo'])){ ?>
                            <td><img src="../img/choco.jpg" alt=""></td>
                            <?php } else{
                             echo "<td><img src='../".$stud['photo']."'></td>";
                            }?>
                            <td><?= $stud['nom'] ?></td>
                            <td><?= $stud['prenom'] ?></td>
                            <td><?= $stud['phone'] ?></td>
                            <td><?= $stud['email'] ?></td>
                            <td><?= $stud['sex'] ?></td>
                            <td class="operations"><i class="las la-trash-alt"></i></td>
                        </tr>
                        <?php $i++;} ?>
                    </tbody>
                </table>
            </div>
        </main>