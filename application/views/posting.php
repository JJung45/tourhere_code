<div class="center contents posting">
    <a href="/board/mypage" class="arrow"><img src="/assets/img/mybackarrow.png" alt="b
    ack"></a>
        <input type="hidden" name="id" id="userId" value='<?= $this->session->userdata('userId'); ?>'/>
        <div class="gall">
            <img src="/assets/img/plus.svg" alt="plus" id="img">
        </div>
        <div class="toupload">
            <a href="javascript:" class="my_button" onclick="fileUploadAction();">upload</a>
            <input type="file" multiple name="upload[]" id="upload" />
        </div>
        <div class="userTxts">

            <textarea name="userTxt" id="userTxt" cols="30" rows="10" placeholder="이곳에 글을 써주세요"></textarea>
        </div>
        <div class="save">
            <a href="javascript:" class="my_button" onclick="submitAction();">Save</a>
        </div>
</div>`