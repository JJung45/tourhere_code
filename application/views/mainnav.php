<?php
    if(!$this->session->userData('userId')){
        echo "
        <script>
            alert('로그인 후 이용가능합니다.');
        </script>";

        redirect('/auth/login');
    }
?>

<div class="header" style="height: 60px;">
    <div class="center headerContent">
        <div class="selectMenu">
            <div class="selectMenul">
                <div class="accomodation">
                    <img src="/assets/img/accomodation.svg" alt="accomodation" onclick="showHint(1)"></div>
                <div class="Restaurant"><img src="/assets/img/restaurant.svg" alt="restaurant" onclick="showHint(2)"></div>
                <div class="Attractions"><img src="/assets/img/see.svg" alt="see" onclick="showHint(3)"></div>
            </div>
        </div>
        <div class="search">
            <input type="search" name="key" id="key" onkeyup="showHint(this.value)" placeholder="검색">
        </div>
        <div class="loginjoin">
            <?php
            if(!$this->session->userdata('is_login')) {
                ?>
                <a href="/auth/login">LOGIN</a>
                <?php
            }else {
                ?>
                <a href="/board/mypage">My Page/</a>
                <a href="/board/notification">Notification</a>
                <?php
            }
            ?>
        </div>
    </div>
</div>
