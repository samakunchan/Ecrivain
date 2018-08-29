var slideshow = document.querySelector(".slideshow");
var initPx = 0;
var moveCloud = function () {
  if (initPx < 4000){
      slideshow.style.backgroundPosition = initPx + "px";
  }else {
      initPx = 0;
  }
    return initPx++;
    //console.log(initPx);
};
setInterval(moveCloud, 90);