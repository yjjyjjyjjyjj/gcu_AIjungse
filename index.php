<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <title>가리단길</title>
</head>
<body>
<!-- Navigation Bar -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light fixed-top"
     style="background-color: #dee2e6!important">
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

<!-- Introduction Section -->
<section id="introduction" class="py-5">
    <div class="container min-vh-100">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="main1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="main2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="main3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="main4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/main/main1.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="./img/main/main2.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="./img/main/main3.jpg" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="./img/main/main4.jpg" class="d-block w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="text-center mt-4">
            <h2>학교 근처에서 밥먹을 곳, 놀 곳을 모르겠을 때!</h2>
            <p>쉽고 빠르게 찾아보세요.</p>
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section id="contact" class="py-5 bg-light" style="background-color: #dee2e6!important">
    <div class="container">
        <h2 class="text-center">문의</h2>
        <p class="text-center">가리단길과 함께 할 소상공인을 모십니다.</p>
        <form id="contactForm">
            <div class="mb-3">
                <label for="storeName" class="form-label">가게명</label>
                <input type="text" class="form-control" id="storeName" placeholder="가게명을 입력하세요">
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">전화번호</label>
                <input type="text" class="form-control" id="phoneNumber" placeholder="전화번호를 입력하세요">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">내용</label>
                <textarea class="form-control" id="message" rows="3" placeholder="내용을 입력하세요"></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">전송하기</button>
            </div>
        </form>
    </div>
</section>

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


    document.getElementById('contactForm').addEventListener('submit', function (event) {
        event.preventDefault();
        const storeName = document.getElementById('storeName').value;
        const phoneNumber = document.getElementById('phoneNumber').value;
        const message = document.getElementById('message').value;

        if (!storeName || !phoneNumber || !message) {
            alert('모든 필드를 입력해 주세요.');
        }
    });
</script>
</body>
</html>