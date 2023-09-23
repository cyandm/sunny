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
  } else {
    target.classList.remove("active");
  }
};

// Function to set the height of an element based on its content
export const setElementHeight = (element) => {
  element.parentElement.style.height = element.clientHeight + "px";
};

// Function to add the "active" class to the first element in a list
export const activateFirstElement = (elements) => {
  if (elements.length > 0) {
    elements[0].classList.add("active");

    elements.forEach((element) => {
      element.addEventListener("mouseover", () => {
        if (!element.classList.contains("active")) {
          elements.forEach((el) => {
            el.classList.remove("active");
          });
          element.classList.add("active");
        }
      });
    });
  }
};
