let blogPageBlog = document.querySelector("#blogs-overview");

if (blogPageBlog) {
  // *********************************swiper slider
  blogMainSlider.on("reachEnd", () => {
    document.body.style.overflowY = "scroll";
  });
}

// ********************************* add class to humberger menu in single blog
const backBtn = document.querySelector("#back-btn");
if (backBtn) {
  document.querySelector(".hamburger-menu").classList.add("single-blog");
}

// **************************************page load category for single blog page
let mobileCategoryList = document.querySelector("#mobile-category-list");
if (mobileCategoryList) {
  let options = mobileCategoryList.querySelectorAll("option");

  for (let i = 0; i < options.length; i++) {
    mobileCategoryList.addEventListener("change", () => {
      window.location = this.value;
    });
  }
}
