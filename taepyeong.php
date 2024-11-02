<?php
include_once "./inc/header.php";
?>

<!-- 카카오맵 API 로드, 실제 발급받은 앱 키를 사용 -->
<script type="text/javascript" src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=67ecda43187f6b484be80dd91ab04dcc"></script>
<style>
    #map {
        height: calc(100vh - 128px);
        width: 100%;
    }
</style>
<body>

<?php
include_once "./inc/navbar.php";
?>

<!-- Map Section -->
<div id="map"></div>

<!-- Modal -->
<div class="modal fade" id="infoModal" role="dialog" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <div id="locationTitle" style="font-size: 20px"></div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="locationImg" src="" class="img-fluid mb-3" alt="Modal Image">
                <div>
                    <pre style="white-space: pre-wrap; font-family: var(--bs-font-sans-serif)" id="locationExplain"></pre>
                </div>
            </div>
            <div class="modal-footer">
                <?php
                if(isset($_SESSION['user_idx'])){
                    ?>
                    <button data-idx="" id="locationZzim" type="button" class="btn btn-outline-danger"><i class="bi bi-heart"></i></button>
                    <?php
                }else{
                    ?>
                    <button style="display: none" id="locationZzim" type="button" class="btn btn-outline-danger"><i class="bi bi-heart"></i></button>
                    <?php
                }
                ?>
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
</script>
<script>
    <!--카카오 map API-->
    // 지도 초기화 함수
    var container = document.getElementById('map'); // 지도를 표시할 div
    var options = {
        center: new kakao.maps.LatLng(37.445084, 127.136794), // 지도의 초기 중심 좌표 (예: 서울 시청)
        level: 4 // 지도의 확대 레벨
    };

    var map = new kakao.maps.Map(container, options); // 지도 생성


    var positions = [
        <?php
        $get_location_sql = "SELECT * FROM location WHERE location_neighborhood = 'tae'";
        $get_location_result = mysqli_query($conn, $get_location_sql);
        while($row = mysqli_fetch_assoc($get_location_result)){
            echo "
            {
                idx: ".$row['location_idx'].",
                title: '".$row['location_title']."',
                latlng: ".$row['location_LatLng']."
            },
        ";
        }
        ?>
    ];

    //마커 imgSrc
    let markerSrc ="./img/markerStar.png";

    // let markers = []
    for(var i=0; i<positions.length; i++){
        let markerSize = new kakao.maps.Size(24, 35);

        let markerImage = new kakao.maps.MarkerImage(markerSrc, markerSize);

        // 마커 생성
        var marker = new kakao.maps.Marker({
            map: map, // 마커를 표시할 지도
            position: positions[i].latlng, // 마커를 표시할 위치
            title : positions[i].title, // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
            image : markerImage, // 마커 이미지
            clickable : true
        });
        marker.idx = positions[i].idx;

        kakao.maps.event.addListener(marker, 'click', makeClickListener(marker));
    }

    function makeClickListener(marker){
        return function (){
            $.ajax({
                url:'./ajax/get_location.php',
                data:{
                    location_idx : marker.idx
                },
                method: "POST",
                dataType: "json",
                success: function (res) {
                    $('#locationTitle').text(res.location_title);
                    $('#locationExplain').text(res.location_explain);
                    $('#locationImg').attr('src', res.location_img);
                    $('#locationZzim').data('idx',res.location_idx);
                    $.ajax({
                        url:'./ajax/get_zzim.php',
                        data:{
                            location_idx : marker.idx,
                            user_idx : <?php echo isset($_SESSION['user_idx'])?$_SESSION['user_idx']:'""';?>
                        },
                        method: "POST",
                        dataType : "json",
                        success:function(res){
                            if(res.zzimYN == 'Y'){
                                $('#locationZzim').removeClass('btn-outline-danger');
                                $('#locationZzim').addClass('btn-danger');
                            }else{
                                $('#locationZzim').removeClass('btn-danger');
                                $('#locationZzim').addClass('btn-outline-danger');
                            }
                            $('#infoModal').modal('show');
                        }
                    })
                }
            })
        };
    }

    // 마커를 지도에 표시
    marker.setMap(map);

    //찜버튼 click
    $("#locationZzim").on("click",function () {
        let method;
        let location_idx = $(this).data('idx');
        if($(this).hasClass('btn-danger')){
            method = 'r';
        }else{
            method = 'i';
        }
        $.ajax({
            url: "./ajax/proc_zzim.php",
            data:{
                method : method,
                location_idx : location_idx,
                user_idx : <?php echo isset($_SESSION['user_idx'])?$_SESSION['user_idx']:'""';?>
            },
            method : "POST",
            dataType : "json",
            success: function (res) {
                if(method == 'r'){
                    if(res.status == 'success'){
                        $('#locationZzim').removeClass('btn-danger');
                        $('#locationZzim').addClass('btn-outline-danger');
                    }else{
                        alert(res.text);
                    }
                }else if(method == 'i'){
                    if(res.status == 'success'){
                        $('#locationZzim').removeClass('btn-outline-danger');
                        $('#locationZzim').addClass('btn-danger');
                    }else{
                        alert(res.text);
                    }
                }
            }
        })
    });
</script>
</body>
</html>
