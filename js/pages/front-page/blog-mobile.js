import { setElementHeight } from "../../modules/functions";

const frontBlogSection2 = document.querySelector("#blog-section");
const blogPage2 = document.querySelector("#blogs-overview");

if (frontBlogSection2 || blogPage2) {
  if (window.innerWidth <= 768) {
    const tabCategory = document.querySelector("#cat-select-mobile");

    tabCategory.addEventListener("change", (event) => {
      const slugCat = event.target.value;

      blogs = document.querySelectorAll(".row-blog-front");

      blogs.forEach((blog) => {
        if (blog.classList.contains(slugCat)) {
          blog.classList.add("active-blogs");

          const firstHeightMobile = document.querySelector(
            "article .active-blogs"
          );
          if (blogPage2) {
            const heightChildrenMobile = firstHeightMobile.children;

            let totalHeight = 0;
            for (let i = 0; i < heightChildrenMobile.length; i++) {
              totalHeight += heightChildrenMobile[i].clientHeight;
            }

            firstHeightMobile.parentElement.style.height =
              totalHeight + 25 + "px";

            window.addEventListener("resize", () => {
              firstHeightMobile.parentElement.style.height =
                totalHeight + 25 + "px";
            });
          } else {
            setElementHeight(firstHeightMobile);
            window.addEventListener(
              "resize",
              setElementHeight(firstHeightMobile)
            );
          }
        } else {
          blog.classList.remove("active-blogs");
        }
      });
    });
  }
}
