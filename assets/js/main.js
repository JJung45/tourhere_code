let section=$('.section');
let overlap=$('.overlap');

section.on('mouseover',function(){
    let idx=$(this).index();
    overlap.eq(idx).css({
        display: 'block'
    });
    $(this).css({
        backgroundSize: '150%'
    });
})
section.on('mouseout',function(){
    let idx=$(this).index();
    overlap.eq(idx).css({
        display: 'none'
    });
    $(this).css({
        backgroundSize: 'cover'
    });
})

let bodyLayer=$('#wrap');

let loginLayer=$('.loginLayer');

let loginLayerLeft=(bodyLayer.width())/2-(loginLayer.width())/2;

let loginLayerTop=(bodyLayer.height())/2-(loginLayer.height())/2;

loginLayer.css({
    left: loginLayerLeft,
    top: loginLayerTop
});

let goTop=$('.goTop');
goTop.on('click',function(){
    $('html,body').animate({
        scrollTop: 0
    },400);
})

$(document).ready(function(){
    $('#upload').on('change',change);
});

function fileUploadAction(){
    $('#upload').trigger('click');
}

function change(e){
    sel_files=[];
    $('#img').hide();
    $('.gall').empty();//수정

    let files=e.target.files;
    let filesArr=Array.prototype.slice.call(files);

    let index=0;
    filesArr.forEach(function(f){
        if(!f.type.match("image.*")){
            alert('이미지 확장자만 가능합니다!');
            return;
        }

        sel_files.push(f);

        let reader=new FileReader();
        reader.onload=function(e){
            let html="<a href=\"javascript:void(0);\" onclick=\"deleteImageAction("+index+")\" id=\"img_id_"+index+"\"><img src=\""+e.target.result+"\" data-file='"+f.name+"' class='selProductFile' title='Click to remove' width=200px; height=200px;></a>";
            $('.gall').append(html);
            index++;
        }
        reader.readAsDataURL(f);
    });
}

function deleteImageAction(index){
    sel_files.splice(index,1);

    let img_id='#img_id_'+index;
    $(img_id).remove();
}

function submitAction(update){
    let filed=new FormData();
    let length = sel_files.length;

    if(sel_files.length<1){
        alert("업로드할 파일을 선택하세요");
        return;
    }

    for(let i=0, len=sel_files.length; i<len; i++){
        let name="image_"+i;
        filed.append(name,sel_files[i]);
    }

    let userId = $('#userId').val();
    let userTxt = $('#userTxt').val();
    let userFile = $('#upload').val();

    console.log(userTxt);
    console.log(userId);
    console.log(userFile);

    filed.append("txt",$('#userTxt').val());
    filed.append("id",$('#userId').val());
    filed.append("imgcount",length);

    if(update=="update"){
        filed.append("update","update");
        filed.append("bidx",$('#bidx').val());
    }

    $.ajax({
        url:"/index.php/posting/do_upload",
        type: 'POST',
        processData: false,
        contentType: false,
        data: filed,
        dataType:'json',
        success: function(repons) {
            alert(repons.currentTarget.responseText);
            window.location.replace("/index.php/board/mypage");
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });

}

//수정
function confirmed(bidx){
    var okay = confirm('정말 삭제하시겠습니까?');
    if(okay){
        window.location.replace("/index.php/board/delete?bidx="+bidx);
    }else{
        window.location.replace("/board/mypage");
    }
}