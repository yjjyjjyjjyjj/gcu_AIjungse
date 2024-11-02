<?php
include_once "./inc/header.php";
if(isset($_SESSION['user_idx'])){
    echo '
        <script>
            location.href="./index.php";
        </script>
    ';
    exit();
}
?>

<body style="padding-top: 70px;">

<?php
include_once "./inc/navbar.php";
?>

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
                        <button id="loginSubmit" type="button" class="btn btn-primary">로그인</button>
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
<script>
    $('#loginSubmit').on('click',function () {
        loginProc();
    });

    $('#password,#username').on('keypress',function (e) {
        if(e.keyCode == 13){
            loginProc();
        }
    });

    function loginProc(){
        if($('#username').val() == ''){
            alert("아이디를 입력해주세요.");
            return false;
        }

        if($('#password').val() == ''){
            alert("비밀번호를 입력해주세요.");
            return false;
        }

        $.ajax({
            url:'./ajax/chk_login.php',
            data: {
                user_id : $('#username').val(),
                user_pw : $('#password').val()
            },
            method: "POST",
            dataType: "json",
            success: function (res) {
                if(res.status == 'success'){
                    location.href='./index.php';
                }else{
                    alert(res.text);
                    $('#username').focus();
                }
            }
        })
    }
</script>
</body>
</html>
