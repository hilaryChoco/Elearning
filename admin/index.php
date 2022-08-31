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
                    <a class="active"><span class="las la-igloo"></span>
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

        <?php $apprenants = $db->query("SELECT COUNT(*) from users WHERE role ='student'");
              $teachers = $db->query("SELECT COUNT(*) from users WHERE role ='teacher'");
              $forums = $db->query("SELECT COUNT(*) from forums");
              $lessons = $db->query("SELECT COUNT(*) from formations");

        ?>
        <main class="dashboard">
            <div class="cards">
                <div class="card-single">
                    <div class="side-formateurs">
                    <?php foreach($teachers as $teacher){ ?>
                        <h1>
                            <?php if($teacher[0] < 10){
                                        echo "0". $teacher[0];
                                  }else{ 
                                      echo $teacher[0];
                                       }
                            ?>
                        </h1>
                        <?php } ?>
                        <span>Formateurs</span>
                    </div>
                    <div>
                        <span class="las la-chalkboard-teacher"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                       <?php foreach($apprenants as $apprenant){ ?>
                        <h1>
                        <?php if($apprenant[0] < 10){
                                        echo "0". $apprenant[0];
                                  }else{ 
                                      echo $apprenant[0];
                                       }
                            ?>                            
                        </h1>
                        <?php } ?>
                        <span>Apprenants</span>
                    </div>
                    <div>
                        <span class="las la-user-graduate"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <?php foreach($forums as $forum){ ?>
                            <h1>
                                <?php if($forum[0] < 10){
                                            echo "0". $forum[0];
                                    }else{ 
                                        echo $forum[0];
                                        }
                                ?>
                            </h1>
                        <?php } ?>
                        <span>Forums</span>
                    </div>
                    <div>
                        <span class="las la-comments"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                    <?php foreach($lessons as $lesson){ ?>
                            <h1>
                                <?php if($lesson[0] < 10){
                                            echo "0". $lesson[0];
                                    }else{ 
                                        echo $lesson[0];
                                        }
                                ?>
                            </h1>
                        <?php } ?>
                        <span>Formations</span>
                    </div>
                    <div>
                        <span class="las la-chalkboard"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Notifications</h3>

                            <button>Voir tout <span class="las la-arrow-right"></span></button>
                        </div>

                        <div class="card-body">
                           
                        </div>
                    </div>
                </div>

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <h3>Apprenants Récents</h3>
                            <button>Voir tout <span class="las la-arrow-right"></span></button>
                        </div>

                        <div class="card-body">
                         <?php   $recents = $db->query("SELECT * FROM users WHERE role = 'student' ORDER BY date_creation DESC limit 3 "); 
                         foreach($recents as $recent){
                             $nom = $recent['prenom']. " ". $recent['nom'];
                             ?>
                            <div class="customer">
                                <div class="info">
                                    <?php if(empty($recent['photo'])){ ?>
                                    <td><img src="../img/avatar.png" alt="" width="40px" height="40px"></td>
                                    <?php } else{ 
                                    echo "<img src='../".$recent['photo']."' width='40px' height='40px'>";
                                    }?>
                                    <div>
                                        <h4><?= $nom ?></h4>
                                        <small>Apprenant(e)</small>
                                    </div>
                                </div>
                                <div class="contact">
                                  <span class="las la-user-circle"></span>  
                                  <span class="las la-comment"></span>   
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

        </main>