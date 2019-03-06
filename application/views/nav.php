    <div class="clearfix hMenu">
        <div class="center gnb">
            <h1><a href="/index.php/tourhere/">Tourhere</a></h1>
            <ul>
                <li class="mainM"><a href="select.php?search=1">Accomodation</a></li>
                <li class="mainM"><a href="select.php?search=2">Restaurant</a></li>
                <li class="mainM"><a href="select.php?search=3">Attractions</a></li>
                <li class="loginjoin">
                    <?php
                    if(!$this->session->userdata('is_login')) {
                        ?>
                        <a href="/index.php/auth/login">LOGIN</a>
                        <?php
                    }else {
                        ?>
                        <a href="/index.php/mypage/main">My Page</a>
                        <?php
                    }
                    ?>

                </li>
                <li class="sub">
                    <img src="/assets/img/menubar.png" alt="menu">
                    <ul class="submenu">
                        <li><a href="select.php?search=1">Accomodation</a></li>
                        <li><a href="select.php?search=2">Restaurant</a></li>
                        <li><a href="select.php?search=3">Attractions</a></li>
                        <li>
                            <?php
                            if(!$this->session->userdata('is_login')) {
                                ?>
                                <a href="/index.php/auth/login">LOGIN</a>
                                <?php
                            }else {
                                ?>
                                <a href="/index.php/mypage/main">My Page</a>
                                <?php
                            }
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>