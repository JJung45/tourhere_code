<?php //수정

if (strpos(',', $data[0]->img) !== false) {
    $img = '';
} else {
    $img = explode(',', $data[0]->img);
}

?>

<div class="center contents posting">
    <a href="/index.php/board/mypage" class="arrow"><img src="/assets/img/mybackarrow.png" alt="b
    ack"></a>
    <input type="hidden" name="bidx" id="bidx" value='<?= $data[0]->bidx ?>'/>
    <input type="hidden" name="id" id="userId" value='<?= $data[0]->id ?>'/>
    <div class="gall">
        <?php for($i=0; $i<count($img); $i++){ ?>
            <img src="/assets/upload/<?= $img[$i] ?>" alt="" width="150px" height="150px" class="galllview">
        <?php }  ?>
    </div>
    <div class="toupload">
        <a href="javascript:" class="my_button" onclick="fileUploadAction();">upload</a>
        <input type="file" multiple name="upload[]" id="upload" />
    </div>
    <div class="userTxts">

        <textarea name="userTxt" id="userTxt" cols="30" rows="10"><?= $data[0]->txt ?></textarea>
    </div>
    <div class="save">
        <a href="javascript:" class="my_button" onclick="submitAction('update');">Save</a>
    </div>
</div>