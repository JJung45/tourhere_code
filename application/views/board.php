<div class="selectMain">
    <div class="center selectContent">
        <ul id="ul">
            <?php foreach ($boards as $board): ?>
                <?php
                if (strpos(',', $board->img) !== false) {
                    $img = '';
                } else {
                    $img = explode(',', $board->img)[0];
                }
                ?>
                <li class='col-4'>
                    <a href='/board/view?num=<?=$board->bidx;?>' style='display:block'>
                        <div class='gallery' style='background:url("/assets/upload/<?=$img?>") no-repeat 50%; background-size:cover'></div>
                    </a>
                    <div class='selectxt'>
                        <div class='selectxts'><?=$board->txt?></div>
                        <p>written by <?=$board->id?></p><span><?=$board->created?></span>
                    </div>
                </li>
            <?php endforeach; ?>

        </ul>
    </div>
</div>
<script>
    var track_page = 1;

    $(window).scroll(function(){
        if($(window).scrollTop()+$(window).height()>=$(document).height()){
            load_contents();
        }
    });

    function load_contents() {
            $.get('/board/boardList', $.param({'pagenum': track_page}), function (data) {
                $("#ul").append(data);
                track_page++;
            }).fail(function (xhr, ajaxOptions, thrownError) {
                alert(thrownError);
            })
    }


</script>