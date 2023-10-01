// ******************************************************faq script
const accordion = document.querySelectorAll(".accordion");

accordion.forEach((wrapper) => {
  if (wrapper.classList.contains("show")) {
    const divContain = wrapper.querySelector(".answer");
    divContain.style.maxHeight = divContain.scrollHeight + 26 + "px";
  }

  const span = wrapper.querySelector(".question");
  span.addEventListener("click", (e) => {
    const contain = wrapper.querySelector(".answer");

    if (wrapper.classList.contains("show")) {
      wrapper.classList.remove("show");
      contain.style.maxHeight = 0;
    } else {
      wrapper.classList.add("show");
      contain.style.maxHeight = contain.scrollHeight + 26 + "px";
      accordion.forEach((w) => {
        if (wrapper != w) {
          const divContain = w.querySelector(".answer");
          w.classList.remove("show");
          divContain.style.maxHeight = 0;
        }
      });
    }
  });
});
