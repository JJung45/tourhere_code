<div class="notification">
    <h1>공지사항</h1>
    <div class="selectMain">
        <div class="center selectContent">
            <ul id="ul">
                <li class='col-12 title'>
                    <p class='col-2'>번호</p>
                    <p class='col-8'>타이틀</p>
                    <p class='col-2'>작성자</p>
                </li>
                <?php
                    $count = count($result);

                    for($i=0; $i<$count; $i++){

                        echo " <li class='col-12'>
                                     <p class='col-2'>".$result[$i]->nidx."</p>
                                     <p class='col-8'>".$result[$i]->title."</p>
                                     <p class='col-2'>관리자</p>
                                </li>";
                    }
                ?>

        </div>
    </div>
</div>