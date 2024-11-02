<?php
include_once '../inc/dbconn.php';

$user_id = $_POST["user_id"];
$user_pw = $_POST["user_pw"];

//id 중복 한번 더 확인
$chk_user_id_sql = "SELECT COUNT(*)AS cnt FROM user WHERE user_id = '${user_id}'";
$chk_user_id_result = mysqli_query($conn, $chk_user_id_sql);
$chk_user_id_row = mysqli_fetch_assoc($chk_user_id_result);

if($chk_user_id_row['cnt'] != 0){
    $data['status'] = 'duplicate';
    $data['text'] = '아이디가 중복 되었습니다.';
    echo json_encode($data, JSON_UNESCAPED_UNICODE);

    exit();
}

$insert_user_sql = "INSERT INTO user(user_id, user_pw) VALUES('${user_id}', '${user_pw}')";
$insert_user_result = mysqli_query($conn, $insert_user_sql);

if($insert_user_result === false){
    $data['status'] = 'error';
    $data['text'] = 'db에러가 발생했습니다.';
    echo json_encode($data, JSON_UNESCAPED_UNICODE);

    exit();
}
$data['status'] = 'success';
$data['text'] = '회원가입 되었습니다. 로그인해주세요.';
echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>