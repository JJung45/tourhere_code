<?php //수정

if (strpos(',', $data[0]->img) !== false) {
    $img = '';
} else {
    $img = explode(',', $data[0]->img);
}

?>

<div class="center contents">
    <a href="/index.php/board/main" class="arrow"><img src="/assets/img/mybackarrow.png" alt="back"></a>

    <div class="center gall viewgall">

        <?php for($i=0; $i<count($img); $i++){ ?>
            <img src="/assets/upload/<?= $img[$i] ?>" alt="" width="150px" height="150px" class="galllview">
        <?php }  ?>
    </div>
    <div class="popUp">
        <div class="popupContents"></div>
    </div>

    <div class="center userTxts">
        <textarea name="" id="userTxt" cols="30" rows="10" disabled><?= $data[0]->txt ?></textarea>
    </div>

</div>