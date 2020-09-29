function clickBar(sub_str) {
    var sub_mean = document.getElementById(sub_str);
    // window.getComputedStyle(sub_mean).display
    // var dis = sub_mean.style.display;
    var dis = window.getComputedStyle(sub_mean).display;
    if (dis == "none") {
        sub_mean.style.display = "block";
    }
    else {
        sub_mean.style.display = "none";
    }
}