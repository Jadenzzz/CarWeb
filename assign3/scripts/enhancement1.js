"use strict";
function backToTop() {
    document.documentElement.scrollTop = 0;
  }
function init(){
  var back_to_top = document.getElementById("back_to_top");
  back_to_top.onclick = backToTop;
}
window.onload = init;
