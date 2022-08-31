<?php include_once '../connection.php';
session_start();
$name = $_SESSION['username'];
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
                    <a class="active"><span class="las la-igloo"></span>
                               <span>Dashboard</span>
                    </a>
                </li>
                <li class="side-instructors" onclick="window.location.assign('formateurs.php')">
                    <a><span class="las la-chalkboard-teacher"></span>
                               <span>Formateurs</span>
                    </a>
                </li>
                <li class="side-formations" onclick="window.location.assign('formations.php')">
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
            <?php $memorises = $db->query("SELECT * from users WHERE login = '$name' ");
            
                foreach($memorises as $memorise){
                if(empty($memorise['photo'])){ 
                    echo "<img src='../img/avatar.png' alt='' width='40px' height='40px'>";
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

        <?php 
              $user_id = $_SESSION['user_id'];
              $teachers = $db->query("SELECT COUNT(*) from payment WHERE id_student ='$user_id'");
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
                        <span>Formations en cours</span>
                    </div>
                    <div>
                        <span class="las la-chalkboard"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>00</h1>
                        <span>Formations terminées</span>
                    </div>
                    <div>
                        <span class="las la-user-graduate"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                            <h1>00</h1>
                        <span>Discussions</span>
                    </div>
                    <div>
                        <span class="las la-comments"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                            <h1>00</h1>
                        <span>Certifications</span>
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
                            <h3>Mes formations</h3>
                            <button style="cursor:pointer">Voir tout<span class="las la-arrow-right"></span></button>
                        </div>

                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>

                <div class="customers">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header-left">
                                <i class="las la-bell"></i>
                                <h3>Notifications</h3>
                            </div>
                            <button style="cursor:pointer">Voir tout <span class="las la-arrow-right"></span></button>
                        </div>

                        <div class="card-body">
                           
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

</body>

</html>