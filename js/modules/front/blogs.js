document.addEventListener("DOMContentLoaded", function () {
  // Function to set the height of an element based on its content
  function setElementHeight(element) {
    element.parentElement.style.height = element.clientHeight + "px";
  }

  // Function to add the "active" class to the first element in a list
  function activateFirstElement(elements) {
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
  }

  // Activate the first child of "active-blogs" after the toggle
  const cardBlogs = document.querySelectorAll(".active-blogs .cart-blog");
  activateFirstElement(cardBlogs);

  // Set the height for the first element with class "active-blogs"
  const firstHeight = document.querySelector(".active-blogs");
  setElementHeight(firstHeight);
  window.onresize = function (event) {
    setElementHeight(firstHeight);
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
      console.log(slug);

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
});
