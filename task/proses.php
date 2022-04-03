<?php

include "conf.php";
include "DB.php";
include "Task.php";


echo $_GET['proses'];


$oTask = new Task($db_host, $db_user, $db_password, $db_name);

$oTask->open();

if($_GET['proses'] == 'add'){
    if (isset($_POST['add'])) {
        $taskName = $_POST['tname'];
        $deadLine = $_POST['tdeadline'];
        $detail = $_POST['tdetails'];
        $subject = $_POST['tsubject'];
        $priority = $_POST['tpriority'];
    }
    
    $oTask->addTask($taskName, $deadLine, $detail, $subject, $priority);
    header("location: index.php");

}else if($_GET['proses'] == 'hapus'){
    if(isset($_GET['id_hapus'])){
        $oTask->deleteTask($_GET['id_hapus']);
        header("location: index.php");
    }
}else if($_GET['proses'] == 'selesai'){
    if(isset($_GET['id_status'])){
        $oTask->selesaiTask($_GET['id_status']);
        header("location: index.php");
    }
}


?>