export const addActiveClassLoop = (target, objectName) => {
  target.classList.add("active");
  objectName.forEach((item) => {
    if (item != target) {
      item.classList.remove("active");
    }
  });
};

export const addClass = (ifContent, target) => {
  if (ifContent) {
    target.classList.add("active");

    target.parentElement.style.height = target.clientHeight + "px";
  } else {
    target.classList.remove("active");
  }
};
