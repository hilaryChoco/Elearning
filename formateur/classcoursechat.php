<?php
    include_once '../connection.php'; 
    session_start();
    $text4="";
    $text5="";
    $new_path = "";
    $createur = $_SESSION['name'];
    $mysqli = new mysqli('localhost', 'root', '', 'elearn') or die(mysqli_error($mysqli));
 

   
   
   
    
    
    if (isset($_POST['submit']) && isset($_GET['class_id'])) {
        $idclass = $_GET['class_id'];
        echo $idclass;
    
        include_once '../connection.php'; 
        $createur = $_SESSION['name'];
        $idclassmessage = $_GET['class_id'];
       
                                                  
                                          
          $msg = $_POST['msg'];
          $mysqli->query("INSERT INTO `messages`(`contenu`,`sender`,`classmessage`) VALUES ('$msg','$createur','$idclassmessage')") or die($mysqli->error);
     
      }
     
 
    ?>
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
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
              #wrapper{
                max-width: 60%;
                min-height: 100%;
                display: flex;
                padding: 5px;
                margin: auto;
                color: #eee;
        
            }
            main{
    width:100%;
    height:100%;
    display:inline-block;
    font-size:15px;
  
    vertical-align:top;
}
main header{
    height:100px;
    padding:30px 20px 30px 40px;
    background-color:#254d69;  
}
main header > *{
    display:inline-block;
    vertical-align:top;
}
main header img:first-child{
    width:45px;
    margin-top:8px;
    border-radius: 50%;
}  
main header img:last-child{
    width:45px;
    margin-top:8px;
    border-radius: 50%;
}
main header div{
    margin-left:90px;
    margin-right:90px;
}
main header h2{
    font-size:25px;
    margin-top:5px;
    text-align:center;
    color:#FFFFFF;  
}
main .inner_div{
    padding-left:0;
    margin:0;
    list-style-type:none;
    position:relative;
    overflow:auto;
    height:480px;
    background-image: url(img/message.svg);
    background-position:center;
    background-repeat:no-repeat;
    background-size:cover;
    position: relative;
    border-top:2px solid #fff;
    border-bottom:2px solid #fff;
     
}
main .triangle{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 8px 8px 8px;
    border-color: transparent transparent
    #6fbced transparent;
    float: right;
    margin-left:20px;
    clear:both;
}
main .message{
    padding:10px;
    color:#000;
    margin-left:15px;
    background-color:#6fbced;
    line-height:20px;
    max-width:40%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
    float: right;
    clear:both;
}
main .triangle1{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 8px 8px 8px;
    border-color: transparent
      transparent #58b666 transparent;
    margin-right:20px;
    float:left;
    clear:both;
}
main .message1{
    padding:10px;
    color:#000;
    margin-right:15px;
    background-color:#58b666;
    line-height:20px;
    max-width:40%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
    float:left;
    clear:both;
}
 
main footer{
    height:25px;
    /* padding:20px 30px 10px 20px; */
    width: 100px;
  
}
main footer .input1{
    resize:none;
    border:100%;
    display:block;
    width:120px;
    height:10px;
    border-radius:3px;
   
    font-size:13px;
    margin-bottom:13px;
    color: black;
}
#box {
            width: fit-content;
            height: fit-content;
            overflow: hidden;
            background: whitesmoke;
            box-shadow: 250px 250px 250px 250px rgba(0.5, 0.5, 0.5, 0.5);
            border-radius: 10px;
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            padding: 10px;
            text-align: center;
            display: none;
          
           
        }

#delete {
            background-color: #DD2F62;
            padding: 5px 15px;
            border-radius: 6px;
            color: white;
            border: 1px solid rgb(31, 161, 226);
            text-decoration: none;
        }
main footer textarea{
    resize:none;
    width:250px;
    height:30px;
    border-radius:3px;
    font-size:13px;
    color: #000;
    margin-bottom:13px;
    
}
main footer .input2{
    resize:none;
    border:100%;
    display:block;
    width:50px;
    height:30px;
    border-radius:3px;
   
    font-size:13px;
    margin-bottom:13px;
    margin-left:100px;
    color:white;
    text-align:center;
    background-color:black;
    border: 2px solid white; 
}

main footer textarea::placeholder{
    color:#000;
}
.week img{
    width: 100%;
    height: 60%;
}
 
            #left_panel{
                min-height: 250px;
                background-color: #34425A;
                flex: 1;
            }
            #right_panel{
                min-height: 250px;
                background-color: #34425A;
                flex: 3;
                
            }
            #header{
                background-color: #34425A;
                height: 35px;
            }
            #header h2{
                font-size: 200px;
                color: #eee;
            }
            #inner_left_panel img{
                width: 100px;
                height: 100px;
                border-radius:50% ;
                text-align: center;
                border: thin solid white;
            }
            #inner_left_panel{
                background-color: #34425A;
                flex: 1;
                min-height: 250px;
                text-align: center;
            } 
            #inner_right_panel{
                background-color: #eee;
                flex: 3;
                height: 465px;
            } 
            #frost{
               color: #eee;
               border: thin 1px white;
               text-decoration: none;
           }
    .loading {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: #3D464D;
  opacity: 0.99;
}
.loading img {
  width: 40px;
  height: 40px;
  position: absolute;
  left: 50%;
  right: 50%;
  bottom: 50%;
  top: 50%;
  margin: -20px;
}
        </style>

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
        <main class="add-formations">
            <div class="add-instructors-head">
                <button class="back formations-back" onclick="window.location.assign('class.php')"><i class="las la-arrow-left"></i><span>Retour</span></button>
                <span class="instructors-title">Class Course Chat</span>
            </div>
            <main>
                <script>
                    function show_func() {

                        var element = document.getElementById("chathist");
                        element.scrollTop = element.scrollHeight;

                    }
                </script>

                <form id="myform" action="classcoursechat.php" method="POST">
                    <div class="inner_div" id="chathist">
                        <?php
                        include_once '../connection.php'; 
                        
                        $query =  $mysqli->query("SELECT sender,contenu, date_message FROM messages where sender!='".$createur."' and classmessage = '".$idclass."' ") or die($mysqli->error);
                        while ($row = $query->fetch_assoc()) :

                        ?>
                            <div id="triangle1" class="triangle1"></div>
                            <div id="message1" class="message1">
                            <div>
                                <span style="color:black;float:right;
                                    font-size:10px;clear:both;">

<h2><?php echo $row['sender']; ?></h2>

                                </span></div>
                                <span style="color:white;float:right;">

                                    <?php echo $row['contenu']; ?></span> <br />
                                <div>
                                    <span style="color:black;float:left;
font-size:10px;clear:both;">
                                      
                                      
                                        <?php echo $row['date_message']; ?>
                                    </span>
                                </div>
                            </div>
                            <br /><br />
                            <?php

endwhile;
?>
 <?php
                        
                        include_once '../connection.php'; 
                        
                        $query =  $mysqli->query("SELECT sender,contenu, date_message FROM messages where sender!='".$createur."' and classmessage = '".$idclass."' " ) or die($mysqli->error);
                        while ($row = $query->fetch_assoc()) :

                        ?>
                            <div id="triangle1" class="triangle1"></div>
                            <div id="message1" class="message1">
                            <div>
                                <span style="color:black;float:right;
                                    font-size:10px;clear:both;">

<h2><?php echo $row['sender']; ?></h2>

                                </span>
                                </div>
                                <div class="week">
                      
                                </div>
                                
                                <div>
                                    <span style="color:black;float:left;
font-size:10px;clear:both;">
                                      
                                        <?php echo $row['date_message']; ?>
                                    </span>
                                </div>
                            </div>
                            <br /><br />
                            <?php

endwhile;
?> <?php
include_once '../connection.php'; 


$query =  $mysqli->query("SELECT sender,contenu, date_message FROM messages where sender='".$createur."' and classmessage = '".$idclass."' ") or die($mysqli->error);
while ($row = $query->fetch_assoc()) :

?>
                            <div id="triangle" class="triangle"></div>
                            <div id="message" class="message">
                            <div>
                                <span style="color:black;float:right;
                                    font-size:10px;clear:both;">

                            <h2><?php echo $row['sender']; ?></h2>

                                </span></div>
                                <span style="color:white;float:left;">
                                
                               
                                    <?php echo $row['contenu']; ?>
                                </span> <br />
                                <div>
                                    <span style="color:black;float:right;
                                    font-size:10px;clear:both;">

                                        <?php echo $row['date_message']; ?>
                                    </span>
                                </div>
                            </div>
                            <br /><br />
                            
                        <?php

                        endwhile;
                        ?>

                    </div>
                    <footer>
                        <table>
                            <tr>
                                <th>

                                </th>
                                <th>
                                    <textarea id="msg" name="msg" rows='3' cols='50' placeholder="Type your message">
    </textarea>
                                </th>
                                <th>
                                    <input class="input2" type="submit" id="submit" name="submit" value="send" ></th>
                            </tr>
                        </table>
                    </footer>
                </form>

        </div>

    </div>
</div>
</div>
</div><!-- Page Inner -->
                



    </div>
 

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
	}

	scrollDown();

	$(document).ready(function(){
      
      $("#sendBtn").on('click', function(){
      	message = $("#message").val();
      	if (message == "") return;

      	$.post("app/ajax/insert.php",
      		   {
      		   	message: message,
      		   	to_id: <?=$chatWith['user_id']?>
      		   },
      		   function(data, status){
                  $("#message").val("");
                  $("#chatBox").append(data);
                  scrollDown();
      		   });
      });

      /** 
      auto update last seen 
      for logged in user
      **/
      let lastSeenUpdate = function(){
      	$.get("app/ajax/update_last_seen.php");
      }
      lastSeenUpdate();
      /** 
      auto update last seen 
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);



      // auto refresh / reload
      let fechData = function(){
      	$.post("app/ajax/getMessage.php", 
      		   {
      		   	id_2: <?=$chatWith['user_id']?>
      		   },
      		   function(data, status){
                  $("#chatBox").append(data);
                  if (data != "") scrollDown();
      		    });
      }

      fechData();
      /** 
      auto update last seen 
      every 0.5 sec
      **/
      setInterval(fechData, 500);
    
    });
</script>
        </main>
