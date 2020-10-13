var pic = document.getElementById("picture");
var prev = document.getElementById("left_btn");
var next = document.getElementById("right_btn");
var picWidth = pic.children[0].offsetWidth;
var move = 0;
console.log(picWidth);

next.onclick = function () {
    if (move == pic.children.length - 1) {
        move = 0;
        pic.style.left = 0 + "px";
    }
    move++;
    pic.style.left = -move * picWidth + "px"
}

prev.onclick = function () {
    if (move == 0) {
        move = pic.children.length - 1;
        pic.style.left = -move * picWidth + "px";
    }
    move--;
    pic.style.left = -move * picWidth + "px"
}

var timer = null;
function autoPlay() {
    timer = setInterval(function () {
        next.onclick();
    }, 3000);
}
autoPlay();


var swiper = document.querySelector(".swiper");
swiper.onmouseenter = function () {
    clearInterval(timer); //移入事件，清除定时器
}
swiper.onmouseleave = function () {
    autoPlay();  //移出事件，继续
}