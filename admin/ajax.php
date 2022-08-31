<?php  
require '../connection.php';
if(isset($_GET['del_id'])){
    $id = (int)$_GET['del_id'];
    $db->query("DELETE from cours WHERE id='$id' ");
}
?>