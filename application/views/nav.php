<!-- header -->
<div id="header">
    <div class="page-width">
        <div id="gnb" class="container">
            <ul class="nav nav-pills">
                <h1 class="col-sm-2"><a href="/index.php/tourhere">TourHere</a></h1>
                <li class="col-sm-2 text-center"><a href="">accomodation</a></li>
                <li class="col-sm-2 text-center"><a href="">restaurant</a></li>
                <li class="col-sm-2 text-center"><a href="">attraction</a></li>
                <?php
                if(!$this->session->userdata('is_login')) {
                ?>
                    <div class="col-sm-2" id="login"><a href="/index.php/tourhere/login">로그인</a> </div>
                <?php
                }else {
                    ?>
                    <div class="col-sm-2" id="login"><a href="/index.php/tourhere/login">로그아웃</a></div>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<!-- main -->
<div id="main" class="container-fluid">