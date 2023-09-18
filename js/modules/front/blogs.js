// ******************************************tab click for front page

// first height for default reload
function heightFunc(height) {
  height.parentElement.style.height = height.clientHeight + "px";
}

const firstHeight = document.querySelector(".active-blogs");
heightFunc(firstHeight);
window.onresize = function (event) {
  heightFunc(firstHeight);
};

// mobile or large view
let windowWidth = window.innerWidth;
let tabCategory;
if (windowWidth <= 992) {
  tabCategory = document.querySelector("#cat-select-mobile");
} else {
  tabCategory = document.querySelectorAll(".category-tab");
}

// tab loop landing
tabCategory.forEach((category) => {
  category.addEventListener("click", (e) => {
    category.classList.add("active-cat");
    tabCategory.forEach((cat) => {
      if (cat != category) {
        cat.classList.remove("active-cat");
      }
    });

    const blogs = document.querySelectorAll(".row-blog");

    blogs.forEach((blogs) => {
      // get slug attribute from category
      const slug = category.getAttribute("data-slug");
      console.log(slug);
      if (blogs.classList.contains(slug)) {
        blogs.classList.add("active-blogs");
        heightFunc(blogs);
        window.onresize = function (event) {
          heightFunc(blogs);
        };
      } else {
        blogs.classList.remove("active-blogs");
      }
    });

    // ****************************** add active class in first child
    const cardBlogs = document.querySelectorAll(".active-blogs .cart-blog");

    cardBlogs[0].classList.add("active");

    cardBlogs.forEach((blog) => {
      blog.addEventListener("mouseover", () => {
        if (blog.classList.contains("active")) {
          blog.classList.remove("active");
        } else {
          blog.classList.add("active");
        }
        blog.classList.add("active");
        cardBlogs.forEach((cart) => {
          if (cart != blog) {
            cart.classList.remove("active");
          }
        });
      });
    });
  });
});

// tab loop for mobile
