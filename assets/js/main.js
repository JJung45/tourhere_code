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

let subLi=$('li.sub>img');
let submenu=$('ul.submenu');
subLi.on('click', function(){
    submenu.animate({
        height: "toggle"
    },1000);
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

function submitAction(){

    if(sel_files.length<1){
        alert("업로드할 파일을 선택하세요");
        return;
    }

    let userId = $('#userId').val();
    let userTxt = $('#userTxt').val();

    console.log(userTxt);
    console.log(userId);
    $.ajax({
        url:"<?php echo site_url('posting/do_upload')?>",
        type: 'POST',
        data:{id:userId, txt: userTxt},
        dataType:'json',
        success: function(repons) {
            alert(repons.currentTarget.responseText);
            location.href='/tourhere/mypage';
        },
        error: function() {
            alert("Invalide!");
        }
    });
}