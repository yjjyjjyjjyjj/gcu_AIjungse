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
                    <?php
                        if(!isset($_SESSION['user_idx'])){
                            echo '<a class="nav-link" href="./login.php">로그인</a>';
                        }else{
                            echo '<div class="nav-link">'.$_SESSION['user_id'].'님</div>';
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    if(!isset($_SESSION['user_idx'])){
                        echo '<a class="nav-link" href="./join.php">회원가입</a>';
                    }else{
                        echo '<a class="nav-link" href="./logout.php">로그아웃</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>