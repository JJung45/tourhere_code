<div class="center header">
    <a href="/index.php/board/main" class="arrow"><img src="/assets/img/mybackarrow.png" alt="back"></a>
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
            <li><a href="/index.php/posting">글 작성</a></li><!--수정-->
            <li><a href="/index.php/auth/logout">로그아웃</a></li>
        </ul>
    </div>
</div>
<div class="section">
    <div class="center sectionContent">
        <ul>
            <?php //수정
            foreach ($boards as $board): ?>
                <?php
                if (strpos(',', $board->img) !== false) {
                    $img = '';
                } else {
                    $img = explode(',', $board->img)[0];
                }

                ?>
                <li class='col-4'>
                    <div class='gallery' style='background:url("/assets/upload/<?= $img ?>") no-repeat 50%; background-size:cover'>
                        <a href='#' onclick="confirmed(<?= $board->bidx ?>)">글삭제</a>
                        <a href='/index.php/board/update?bidx=<?=$board->bidx?>'>글수정</a>
                    </div>
                    <div class='selectxt'>
                        <div class='selectxts'><?=$board->txt?></div>
                        <p>written by <?=$board->id?></p>
                        <span ><?=$board->created?></span>
                    </div>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>
</div>
<div class="goTop">
    <img src="/assets/img/upward.svg" alt="">
</div>