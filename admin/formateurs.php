<?php include_once '../connection.php'; 
session_start();
    if(isset($_GET['formateurid']) ){
        $db->exec("DELETE FROM users WHERE id='" . $_GET["formateurid"] . "'");
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
                               <span>Activit??s</span>
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
                               <span>D??connexion</span>
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

        <main class="instructors">
            <div class="instructors-head">
                <button class="add side-add"  onclick="window.location.assign('addteacher.php')"><i class="las la-plus"></i><span>Ajouter</span></button>
                <span class="instructors-title">Liste Des Formateurs</span>
                <button class="see side-see" onclick="window.location.assign('teacher_archives.php')"><i class="las la-file-archive"></i><span>Archives </span></button>
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
                            <th>Grade</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php 
                $i = 1;
            $formateurs = $db->query("SELECT * FROM users WHERE role = 'teacher'");
                foreach($formateurs as $formateur){
            ?>

                        <tr>
                            <td><?= $i ?></td>
                            <?php  if(empty($formateur['photo'])){ ?>
                            <td><img src="../img/avatar.png" alt=""></td>
                            <?php } else{ 
                             echo "<img src='../".$formateur['photo']."'>";
                            }?>
                            <td style="text-transform:capitalize"><?= $formateur['nom'] ?></td>
                            <td style="text-transform:capitalize"><?= $formateur['prenom'] ?></td>
                            <td><?= $formateur['phone'] ?></td>
                            <td><?= $formateur['email'] ?></td>
                            <td style="text-transform:capitalize"><?= $formateur['sex'] ?></td>
                            <td style="text-transform:capitalize"><?= $formateur['grade'] ?></td>
                            <td class="operations"><a href="student_view.php?id=<?= $formateur['id']; ?>"><i class="las la-eye"></i></a>
                                    <i class="las la-pen"></i>
                                    <a href="formateurs.php?formateurid=<?= $formateur['id']; ?>"><i class="las la-trash-alt"></i></a></td>
                        </tr>
                        <?php $i++;} ?>
                    </tbody>
                </table>
            </div>
        </main>