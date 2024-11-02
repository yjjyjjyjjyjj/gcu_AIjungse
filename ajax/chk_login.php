<?php
include_once '../inc/dbconn.php';

$user_id = $_POST["user_id"];
$user_pw = $_POST["user_pw"];

//아이디 패스워드 확인
$chk_login_sql = "SELECT * FROM user WHERE user_id='${user_id}' and user_pw='${user_pw}'";
$chk_login_result = mysqli_query($conn, $chk_login_sql);
$chk_login_row = mysqli_fetch_assoc($chk_login_result);

if($chk_login_row==null){
    $data['status'] = 'error';
    $data['text'] = '아이디나 패스워드가 일치하지 않습니다.';
    echo json_encode($data, JSON_UNESCAPED_UNICODE);

    exit();
}

//세션 시작
session_start();
$_SESSION['user_idx'] = $chk_login_row['user_idx'];
$_SESSION['user_id'] = $chk_login_row['user_id'];


$data['status'] = 'success';
$data['text'] = '';
echo json_encode($data, JSON_UNESCAPED_UNICODE);