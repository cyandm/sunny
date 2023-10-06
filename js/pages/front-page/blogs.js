import {
  activateFirstElement,
  setElementHeight,
} from "../../modules/functions";

const frontBlogSection = document.querySelector("#blog-section");
const blogPage = document.querySelector("#blogs-overview");
if (frontBlogSection
) {
  // Activate the first child of "active-blogs" after the toggle
  const cardBlogs = document.querySelectorAll(".active-blogs .cart-blog");
  activateFirstElement(cardBlogs);

  // Set the height for the first element with class "active-blogs"
  const height = (firstHeight) => {
    if (blogPage) {
      const heightChildren = firstHeight.children;

      let totalHeight = 0;
      for (let i = 0; i < heightChildren.length; i++) {
        totalHeight += heightChildren[i].clientHeight;
      }
      firstHeight.parentElement.style.height = totalHeight + 25 + "px";
      window.addEventListener("resize", () => {
        firstHeight.parentElement.style.height = totalHeight + 25 + "px";
      });
    } else {
      setElementHeight(firstHeight);
      window.addEventListener("resize", setElementHeight(firstHeight));
    }
  };

  let firstHeight = document.querySelector("article .active-blogs");
  height(firstHeight);
  // Determine the appropriate category tabs based on screen width

  if (window.innerWidth >= 768) {
    let tabCategory = document.querySelectorAll(".category-tab");

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

        blogs = document.querySelectorAll(".row-blog-front");
        blogs.forEach((blog) => {
          if (blog.classList.contains(slug)) {
            blog.classList.add("active-blogs");

            height(blog);
          } else {
            blog.classList.remove("active-blogs");
          }
        });

        // Activate the first child of "active-blogs" after the toggle
        const cardBlogs2 = document.querySelectorAll(
          ".active-blogs .cart-blog"
        );
        activateFirstElement(cardBlogs2);
      });
    });
  }
}
