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

    $.ajax({
        url:"/posting/do_upload",
        type: 'POST',
        processData: false,
        contentType: false,
        data: filed,
        dataType:'json',
        success: function(repons) {
            alert(repons.currentTarget.responseText);
            window.location.replace('/board/mypage');
        },
        error: function(request, status, error) {
            alert(request.responseText);
        }
    });
    //
    //
    // let data=new FormData();
    //
    // if(sel_files.length<1){
    //     alert("업로드할 파일을 선택하세요");
    //     return;
    // }
    //
    // for(let i=0, len=sel_files.length; i<len; i++){
    //     let name="image_"+i;
    //     data.append(name,sel_files[i]);
    // }
    // data.append("id", $('#userId').val());
    // data.append("txt",$('#userTxt').val());
    //
    // let xhr=new XMLHttpRequest();
    // xhr.open("POST",'/posting/do_upload');
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    // xhr.onload=function(e){
    //     if(this.status==200){
    //         console.log("result: "+e.currentTarget.responseText);
    //
    //         alert(e.currentTarget.responseText);
    //         location.href='select.php';
    //     }else{
    //         console.log("no");
    //     }
    // }
    // xhr.send(data);
}