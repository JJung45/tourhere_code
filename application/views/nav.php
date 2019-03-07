    <div class="clearfix hMenu">
        <div class="center gnb">
            <h1><a href="/tourhere/">Tourhere</a></h1>
            <ul>
                <li class="mainM"><a href="/board/main?search=1">Accomodation</a></li>
                <li class="mainM"><a href="/board/main?search=2">Restaurant</a></li>
                <li class="mainM"><a href="/board/main?search=3">Attractions</a></li>
                <li class="loginjoin">
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

                </li>
                <li class="sub">
                    <img src="/assets/img/menubar.png" alt="menu">
                    <ul class="submenu">
                        <li><a href="/board/main?search=1">Accomodation</a></li>
                        <li><a href="/board/main?search=2">Restaurant</a></li>
                        <li><a href="/board/main?search=3">Attractions</a></li>
                        <li>
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
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>