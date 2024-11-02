<?php
include_once '../inc/dbconn.php';

$location_idx = $_POST['location_idx'];
if($_POST['user_idx'] != ''){
    $user_idx = $_POST['user_idx'];
}else{
    $user_idx = 0;
}

//찜 데이터 가져오기
$get_zzim_sql = "SELECT COUNT(*)AS zzimYN FROM zzim WHERE location_idx=${location_idx} AND user_idx = ${user_idx}";
$get_zzim_result = mysqli_query($conn, $get_zzim_sql);
$get_zzim_row = mysqli_fetch_assoc($get_zzim_result);

if($get_zzim_row['zzimYN'] == 1){
    $data['zzimYN'] = 'Y';
}else{
    $data['zzimYN'] = 'N';
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);