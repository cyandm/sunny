const sectionHeadings = document.querySelectorAll(
  "#content-single h2, #content-single h3"
);
const scrollList = document.querySelector(".scroll-list");
const scrollListMobile = document.querySelector(".scroll-list-mobile");

if (sectionHeadings && scrollList && scrollListMobile) {
  sectionHeadings.forEach((heading, index) => {
    // Create a random ID
    const randomId = "section-" + index;
    // Assign the ID to the heading
    heading.id = randomId;

    // Assign the ID to headings h2 , h3 in the blog content
    const contentHeadings = document.querySelectorAll(
      "#content-single h2, #content-single h3"
    );
    contentHeadings[index].id = randomId;

    // Create a link in the quick access list
    const listItem = document.createElement("li");
    if (contentHeadings[index].tagName === "H3") {
      listItem.classList.add("sub-li");
    }

    const link = document.createElement("a");
    link.textContent = heading.textContent;
    link.href = "#" + randomId;
    link.addEventListener("click", (event) => {
      event.preventDefault();

      // Scroll smoothly to the target section
      document.querySelector(link.getAttribute("href")).scrollIntoView({
        behavior: "smooth",
      });
    });

    listItem.appendChild(link);

    // Add the list item to both scrollList and scrollListMobile
    scrollList.appendChild(listItem);
    scrollListMobile.appendChild(listItem.cloneNode(true));
  });





}
