import gsap from "gsap";
import { _ticker } from "gsap/gsap-core";

const speed = 50;
const allTicker = document.querySelectorAll(".ticker-custom");
if (allTicker) {
  for (let i = 0; i < allTicker.length; i++) {
    const target = allTicker[i];
    const original_html = target.innerHTML;
    const new_html = "<div class='ticker-items'>" + original_html + "</div>";
    target.innerHTML = new_html;
    target.innerHTML = target.innerHTML + new_html;

    const tickerWidth = document.querySelector(".ticker-items").offsetWidth;
    const initDuration = tickerWidth / speed;

    gsap.to(".ticker-items", {
      duration: initDuration,
      xPercent: -100,
      ease: "none",
      repeat: -1,
    });
  }
}
