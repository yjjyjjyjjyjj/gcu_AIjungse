<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <title>가리단길 - 지도</title>
    <style>
        #map {
            height: calc(100vh - 128px);
            width: 100%;
        }
    </style>

    <!-- 카카오맵 API 로드, 실제 발급받은 앱 키를 사용 -->
    <script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=67ecda43187f6b484be80dd91ab04dcc"></script>
</head>
<body>
<!-- Navigation Bar -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="background-color: #dee2e6!important">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">가리단길</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php#introduction">소개</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#map" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        맛집/놀곳 지도
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./bokjeong.php">복정동</a></li>
                        <li><a class="dropdown-item" href="./taepyeong.php">태평동</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php#contact">문의</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">로그인</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./join.php">회원가입</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Map Section -->
<div id="map"></div>

<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex">
                <img src="https://placehold.co/150x150" class="img-fluid me-3" alt="Modal Image">
                <div class="flex-grow-1">
                    <p>여기에 설명을 입력하세요.</p>
                    <div class="text-end">
                        <button type="button" class="btn btn-outline-danger"><i class="bi bi-heart"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-light text-center text-lg-start">
    <div class="container p-4">
        <div class="text-center">
            copyright &copy; by 가리단길. All Right Reserved
        </div>
    </div>
</footer>

<script src="./js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        //navbar 높이 조절
        let navHeight = document.getElementById('navbar').offsetHeight;
        document.querySelector("body").style.cssText = 'padding-top: ' + navHeight + 'px';
    });


    // 여기에 지도 초기화 코드가 들어갑니다 (예: Google Maps API, Kakao Maps API 등)
</script>
<!--카카오 map API-->
<script>
    let markerSrc ="./img/marker.svg";
    let markerSize = new kakao.maps.Size(44, 49);
    let markerOption = {offset: new kakao.maps.Point(17,49)};

    // 지도 초기화 함수
    var container = document.getElementById('map'); // 지도를 표시할 div
    var options = {
        center: new kakao.maps.LatLng(37.454937, 127.128533), // 지도의 초기 중심 좌표 (예: 서울 시청)
        level: 4 // 지도의 확대 레벨
    };

    var map = new kakao.maps.Map(container, options); // 지도 생성

    // 마커가 표시될 위치
    let markerImage = new kakao.maps.MarkerImage(markerSrc, markerSize, markerOption);
    var markerPosition  = new kakao.maps.LatLng(37.454937, 127.128533);

    // 마커 생성
    var marker = new kakao.maps.Marker({
        position: markerPosition,
        image: markerImage // 마커이미지 설정
    });

    // 마커를 지도에 표시
    marker.setMap(map);
</script>
</body>
</html>
