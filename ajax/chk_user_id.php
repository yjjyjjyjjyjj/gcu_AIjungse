<?php
include_once '../inc/dbconn.php';

$user_id = $_POST["user_id"];

$chk_user_id_sql = "SELECT  COUNT(*)AS cnt FROM user WHERE user_id = '${user_id}'";

$chk_user_id_result = mysqli_query($conn, $chk_user_id_sql);
$chk_user_id_row = mysqli_fetch_assoc($chk_user_id_result);

echo json_encode($chk_user_id_row,JSON_UNESCAPED_UNICODE);