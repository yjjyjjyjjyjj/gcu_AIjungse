<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
  <title>가리단길 - 로그인</title>
</head>
<body style="padding-top: 70px;">
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="background-color: #dee2e6!important">
  <div class="container-fluid">
    <a class="navbar-brand" href="./index.php">가리단길</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="./index.php#introduction">소개</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#map" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

<!-- Login Form Section -->
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center mb-4">로그인</h2>
        <form id="loginForm">
          <div class="mb-3">
            <label for="username" class="form-label">아이디</label>
            <input type="text" class="form-control" id="username" placeholder="아이디를 입력하세요">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">비밀번호</label>
            <input type="password" class="form-control" id="password" placeholder="비밀번호를 입력하세요">
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">로그인</button>
          </div>
        </form>
      </div>
    </div>
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
</body>
</html>
