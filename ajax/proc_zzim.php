<?php
include_once '../inc/dbconn.php';

if(!isset($_POST['user_idx']) || $_POST['user_idx'] == ''){
    $data['status'] = "error";
    $data['text'] = '유저 값이 전달되지 않았습니다.';
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit();
}else{
    $user_idx = $_POST['user_idx'];
}

if(!isset($_POST['location_idx']) || $_POST['location_idx'] == ''){
    $data['status'] = "error";
    $data['text'] = '장소 값이 전달되지 않았습니다.';
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit();
}else{
    $location_idx = $_POST['location_idx'];
}

if(!isset($_POST['method']) || $_POST['method'] == ''){
    $data['status'] = "error";
    $data['text'] = 'method 값이 전달되지 않았습니다.';
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit();
}else{
    $method = $_POST['method'];
}

if($method == 'i'){
    $insert_zzim_sql = "INSERT INTO zzim(user_idx, location_idx) VALUES(${user_idx}, ${location_idx})";
    $insert_zzim_result = mysqli_query($conn, $insert_zzim_sql);

    if($insert_zzim_result === false){
        $data['status'] = 'error';
        $data['text'] = 'db에러가 발생했습니다.';
        echo json_encode($data, JSON_UNESCAPED_UNICODE);

        exit();
    }
    $data['status'] = 'success';
    $data['text'] = '찜 되었습니다.';
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}else if($method == 'r'){
    $delete_zzim_sql = "DELETE FROM zzim WHERE user_idx = ${user_idx} AND location_idx = ${location_idx}";
    $delete_zzim_result = mysqli_query($conn, $delete_zzim_sql);

    if($delete_zzim_result === false){
        $data['status'] = 'error';
        $data['text'] = 'db에러가 발생했습니다.';
        echo json_encode($data, JSON_UNESCAPED_UNICODE);

        exit();
    }
    $data['status'] = 'success';
    $data['text'] = '찜 삭제되었습니다.';
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}