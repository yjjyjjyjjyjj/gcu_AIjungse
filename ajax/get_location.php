<?php
include_once '../inc/dbconn.php';

$location_idx = $_POST['location_idx'];

//장소 데이터 가져오기
$get_location_sql = "SELECT * FROM location WHERE location_idx = ${location_idx}";
$get_location_result = mysqli_query($conn, $get_location_sql);
$get_location_row = mysqli_fetch_assoc($get_location_result);

echo json_encode($get_location_row, JSON_UNESCAPED_UNICODE);