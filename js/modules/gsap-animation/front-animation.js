import {gsap} from "gsap";

gsap.from([".custom-logo-link img",".menu li.menu-item",".btn-column  "], {
    duration: 1,
    opacity: 0,
    y: 30,
    ease: "expo.inOut",
    stagger: {
        grid: [7,15],
        from: "end",
        amount: 1.5
    }
});




gsap.to( ".overly.first", {
    duration:.5,

    top:"-100%",
    ease:"expo.inOut"
});
gsap.to( ".overly.second", {
    duration:.7,
    top:"-100%",
    ease:"expo.inOut"
});
gsap.to( ".overly.third", {
    duration:1,
    top:"-100%",
    ease:"expo.inOut"
});