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

let bodyLayer=$('#main');

let loginLayer=$('.loginLayer');

let loginLayerLeft=(bodyLayer.width())/2-(loginLayer.width())/2;

let loginLayerTop=(bodyLayer.height())/2-(loginLayer.height())/2;

loginLayer.css({
    left: loginLayerLeft,
    top: loginLayerTop
});