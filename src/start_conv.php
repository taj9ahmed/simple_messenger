<?php
session_start();
//session_register('$se_conv_id');
 require_once 'db_param.php';
 //require_once 'get old conv.php';


// START create new conversation in conversation register
$num_particip = 2 ;//$_POST[''];
//$creation_date = date("Y/m/d");
$cnv_crt_time =  date("Y-m-d H:i:s"); //date("h:i:sa") ;//NEW DATE()
$cur_mem = $_SESSION['login_user'];//must be changed to id of session-user via a query/*/better @ login verification
$other_mem = $_POST['member_sel'] ;//must be changed to id of other-member via a query/*/better @ login verification
$particip_id = $other_mem." ".$cur_mem;
//print_r($cur_mem);
try {
    $db_conv = new PDO ($dsn, $user_db, $pass_db);
    $db_conv -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $q_conv= "INSERT INTO `conv_reg` (`num_particip`, `creation_time`, `particip_id`) VALUES ('$num_particip', '$cnv_crt_time', '$particip_id');";

    $db_conv -> exec($q_conv);
    ///print_r($cur_mem);
    ///print_r('cccxccc');
} catch (Exception $ex) {
    echo 'ERROR DBASE CONNECTION '.$ex->getMessage();
} 
// END create new conversation in conversation register

$_SESSION['se_conv_id'] =  $db_conv->lastInsertId();
print_r($_SESSION['se_conv_id']);
//require_once 'send msg.php';




