<div class="center header">
    <a href="/board/main" class="arrow"><img src="/assets/img/mybackarrow.png" alt="back"></a>
    <div class="image">
        <div class="galler">
            <img src="/assets/img/person.png" alt="test">
        </div>
    </div>
    <div class="userInfo">
        <div class="userup">
            <p class="userId"><?= $this->session->userdata('userId'); ?>님</p>
        </div>
        <ul class="userDown">
            <li><a href="/posting">글 작성</a></li>
            <li><a href="../member/update.php">회원정보수정</a></li>
            <li><a href="/auth/logout">로그아웃</a></li>
        </ul>
    </div>
</div>
<div class="section">
    <div class="center sectionContent">
        <ul>



<!--						<li class='col-4'>-->
<!--                        <div class='gallery' style='background:url(/assets/img/bg1.jpg) no-repeat 50%; background-size:cover'><a href='deleteposting.php'>글삭제</a><a href='updateposting.php'>글수정</a>-->
<!--                        </div>-->
<!--                        <div class='selectxt'>-->
<!--                            -->
<!--                            <div class='selectxts'>ddddd"</div>-->
<!--							<p>written by dddd</p>-->
<!--							<span >dddd</span>-->
<!--                        </div>-->
<!--                    </li>-->
<!--        </ul>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="goTop">-->
<!--    <img src="/assets/img/upward.svg" alt="">-->
<!--</div>-->
                <?php

                $count = count($bidx)-1;

                if($count>-1) {

                    while ($count != -1) {

                        $image = explode(",", $img[$count]);
                        $imagepath = "/assets/upload/" . $image[0];

                        echo "
						<li class='col-4'>
                        <div class='gallery' style='background:url(" . $imagepath . ") no-repeat 50%; background-size:cover'><a href='/board/update?bidx=" . $bidx[$count] . "'>글삭제</a><a href='updateposting.php?bidx=" . $bidx[$count] . "'>글수정</a>
                        </div>
                        <div class='selectxt'>

                            <div class='selectxts'>" . $txt[$count] . "</div>
							<p>written by " . $id[$count] . "</p>
							<span >" . $created[$count] . "</span>
                        </div>
                    </li>";

                        $count--;
                    }
                }

                ?>
        </ul>
    </div>
</div>
<div class="goTop">
    <img src="/assets/img/upward.svg" alt="">
</div>