import { activateFirstElement, setElementHeight } from "./functions";
import Swiper from "swiper";

const blogPage = document.querySelector("#blogs-overview");

if (blogPage) {
  // *********************************swiper slider
  const blogOverviewSlider = document.querySelector(".blog-page-slider");
  if (blogOverviewSlider) {
    const mainSlider = new Swiper(blogOverviewSlider, {
      slidesPerView: 1,
      spaceBetween: 0,
      mousewheel: true,
      // speed: 1000,
      // autoplay: {
      //   delay: 3000,
      //   disableOnInteraction: false,
      // },
    });
  }

  // ************************************ tab blogs
  // Activate the first child of "active-blogs" after the toggle
  // const cardBlogs = document.querySelectorAll(".active-blogs .cart-blog");
  // activateFirstElement(cardBlogs);

  // Set the height for the first element with class "active-blogs"

  const blogFirstHeight = document.querySelector("article .active-blogs");
  console.log(tabCategory);
  setElementHeight(blogFirstHeight);
  window.onresize = function (event) {
    setElementHeight(blogFirstHeight);
  };

  // Determine the appropriate category tabs based on screen width
  let windowWidth = window.innerWidth;
  let tabCategory;
  if (windowWidth <= 992) {
    tabCategory = document.querySelector("#cat-select-mobile");
  } else {
    tabCategory = document.querySelectorAll(".category-tab");
  }

  // Event listener for category tabs
  tabCategory.forEach((category) => {
    category.addEventListener("click", (e) => {
      category.classList.add("active-cat");
      tabCategory.forEach((cat) => {
        if (cat != category) {
          cat.classList.remove("active-cat");
        }
      });

      // Get the slug attribute from the clicked category

      const slug = category.getAttribute("data-slug");

      // Toggle the "active-blogs" class based on the slug
      const blogs = document.querySelectorAll(".row-blog");

      blogs.forEach((blog) => {
        if (blog.classList.contains(slug)) {
          blog.classList.add("active-blogs");
          setElementHeight(blog);
          window.onresize = function (event) {
            setElementHeight(blog);
          };
        } else {
          blog.classList.remove("active-blogs");
        }
      });

      // Activate the first child of "active-blogs" after the toggle
      const cardBlogs2 = document.querySelectorAll(".active-blogs .cart-blog");
      activateFirstElement(cardBlogs2);
    });
  });
}
