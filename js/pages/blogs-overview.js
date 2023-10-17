

let blogPageBlog = document.querySelector("#blogs-overview");

if (blogPageBlog) {
  // ********************************* add class to humberger menu in single blog
  const backBtn = document.querySelector("#back-btn");
  if (backBtn) {
    document.querySelector(".hamburger-menu").classList.add("single-blog");
  }

  // ******************************** add class to header
  blogPageBlog.addEventListener('scroll', ()=> {
    const header = document.querySelector('header');
    console.log(header);
    var scrollHeight = window.scrollY;
    console.log(scrollHeight);
    if (scrollHeight >= window.innerHeight) {
      console.log('scrolled');
      header.classList.add('scrolled');
    } else {

      header.classList.remove('scrolled');
    }

    if (scrollHeight < window.innerHeight - 0.1 * window.innerHeight) {
      header.classList.remove('scrolled');
    }
  });





}

// **************************************page load category for single blog page
let mobileCategoryList = document.querySelector(".mobile-category-list");

if (mobileCategoryList) {
  for (let i = 0; i < mobileCategoryList.length; i++) {
    mobileCategoryList.addEventListener("change", () => {
      window.location = mobileCategoryList[i].value;
    });
  }
}
