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

<!-- Signup Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">회원가입</h2>
                <form id="signupForm">
                    <div class="mb-3">
                        <label for="username" class="form-label">아이디</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="username" placeholder="아이디를 입력하세요">
                            <button class="btn btn-primary" type="button" id="checkUsername">중복확인</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">비밀번호</label>
                        <input type="password" class="form-control" id="password" placeholder="비밀번호를 입력하세요">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">비밀번호 확인</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="비밀번호를 다시 입력하세요">
                    </div>
                    <div class="text-center">
                        <button id="joinSubmit" type="button" class="btn btn-primary">가입</button>
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
    $('#checkUsername').on('click', function () {
        if($('#username').val() != ''){
            $.ajax({
                url:'./ajax/chk_user_id.php',
                data: {user_id : $('#username').val()},
                method: "POST",
                dataType: "json",
                success: function (res) {
                    if(res.cnt == 0){
                        alert("사용 가능한 아이디입니다.");
                        $('#checkUsername').removeClass('btn-primary');
                        $('#checkUsername').addClass('btn-success');
                        $('#username').attr("disabled", true);
                        $('#checkUsername').attr("disabled", true);
                    }else{
                        alert("이미 사용 중인 아이디입니다.");
                        $('#username').focus();
                    }
                }
            })
        }else{
            alert("Id를 입력해주세요.");
            return false;
        }
    });
    
    $('#joinSubmit').on('click', function () {
        if($('#username').val() == ''){
            alert("아이디를 입력해주세요.");
            return false;
        }
        if(!$('#checkUsername').hasClass('btn-success') && $('#username').attr('disabled') != true && $('#checkUsername').attr('disabled') != true){
            alert("아이디 중복여부를 체크해주세요.");
            return false;
        }
        if($('#confirmPassword').val() == ''){
            alert("비밀번호 확인란을 입력해주세요.");
            return false;
        }
        if($('#password').val() == ''){
            alert("비밀번호를 입력해주세요.");
            return false;
        }
        if($('#password').val() != $('#confirmPassword').val()){
            alert("비밀번호 확인이 일치하지 않습니다.");
            return false;
        }

        $.ajax({
            url:'./ajax/join.php',
            data: {
                user_id : $('#username').val(),
                user_pw : $('#password').val()
            },
            method: "POST",
            dataType: "json",
            success: function (res) {
                if(res.status == 'duplicate'){
                    alert(res.text);
                    location.reload();
                }else if(res.status == 'error'){
                    alert(res.text);
                }else{
                    alert(res.text);
                    location.href = './login.php';
                }
            }
        })
    });
</script>
</body>
</html>
