<div class="clearfix hMenu">
    <div class="center gnb">
        <h1><a href="/tourhere/">Tourhere</a></h1>
        <h2 class="loginjoin">
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

        </h2>
    </div>
</div>