<?php
session_start();
include_once '../connection.php';
    if(isset($_GET['id']) ){
        if($_GET['id']!=""){
            $id1 = $_GET['id'];
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
                    <a><span class="las la-chalkboard-teacher"></span>
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
                <small style="margin-left:10px; margin-bottom:10px"><span style="font-weight:bold; color:blue"><?= $key['prix'] ?> XAF</span></small>
                <small style="margin-left:10px; margin-bottom:10px">Type de formation: <span style="font-weight:bold"><?= $key['type'] ?></span></small>
                <small style="margin-left:10px;margin-bottom:10px">Durée:<span style="font-weight:bold"><?= $key['duree'] ?></span> heure(s)</small>

                <small style="margin-left:10px; margin-bottom:10px">Date creation: <span style="font-weight:bold"><?= $key['date_creation'] ?></span></small>
                <small style="margin-left:10px; margin-bottom:30px">Auteur: <span style="font-weight:bold"><?= $key['cree_par'] ?></span></small>

                <div>
                    <h4 style="text-align:center">Liste des apprenants</h4>
                    <table class="instructors-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i = 1;
                            $students = $db->query("SELECT * FROM users WHERE role = 'student'");
                                foreach($students as $student){
                            ?>

                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $student['nom'] ?></td>
                                    <td><?= $student['prenom'] ?></td>
                                    <td class="operations">
                                        <a href="student_view.php?id=<?= $student['id']; ?>"><i class="las la-eye" style="color:blue"></i></a>
                                    </td>
                                </tr>
                                <?php $i++;} ?>
                            </tbody>
                        </table>
                </div>

            </div>

            <div class="formation_view_right">
                <div class="add-lessons">
                    <span style="font-size:20px; font-weight:bold">Cours de la formation</span>
                    <button class="new_lesson" onclick="window.location.assign('add_lessons.php')"><i class="las la-plus"></i><span>Ajouter un cours</span></button>
                </div>

                <div class="lessons-body">
                    <?php 
                    $ref = $_SESSION['formationid'];
                    $lessons = $db->query("SELECT * FROM cours WHERE id_formation ='$ref' ");
                    foreach($lessons as $lesson){ ?>
                    <div class="lessons-card">
                       <?php echo "<embed src='../".$lesson['fichiers']."' width='190px' height='100px' type=''>";?>
                       <span style="margin-left:10px; margin-top:10px; margin-bottom:10px; font-weight:bold"><?= $lesson['libelle'].".".$lesson['ext'];?></span>
                       <small style="margin-left:10px; margin-bottom:10px">Date création <span style="font-weight:bold"><?= $lesson['date_creation'] ?></br></span> Auteur <span style="font-weight:bold"><?= $lesson['cree_par'] ?></span></small>
                        <div class="lesson_operations">
                            <a href="lesson_view.php?id=<?= $lesson['id']; ?>"><i style="color:black; font-size:20px" class="las la-eye"></i></a>
                            <a href="#"><i class="las la-pen" style="font-size:20px; color:blue"></i></a>
                            <i class="las la-trash-alt" name='del_<?=$lesson["id"] ?>' id="<?=$lesson['id'] ?>" style="font-size:20px; color:red" onclick="deleteElement(event)" ></i>
                        </div>
                    </div>
                        <?php } ?>
                </div>
                <button class="start_lesson">Démarrer cours</button>
            </div>
;
            <?php } ?>
        </main>
        <script>

            function deleteElement(event){
                console.log(event.target.getAttribute("id"))
                var id = event.target.getAttribute("id");
                var http = new XMLHttpRequest();
                http.open('POST','ajax.php?del_id='+id);
                http.send();
                window.location.reload();
            }
        </script>
