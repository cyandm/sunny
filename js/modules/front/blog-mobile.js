import {activateFirstElement, setElementHeight} from "../functions";

const frontBlogSection2 = document.querySelector("#blog-section");
const blogPage2 = document.querySelector("#blogs-overview");
if (frontBlogSection2 || blogPage2) {
    if (window.innerWidth <= 768) {
        const tabCategory = document.querySelector("#cat-select-mobile");

        tabCategory.addEventListener('change', (event) => {

            const slugCat = event.target.value;


            let blogs;
            if (blogPage2) {
                blogs = document.querySelectorAll(".blog-page-row-blog");
            } else {
                blogs = document.querySelectorAll(".row-blog");
            }

            blogs.forEach((blog) => {
                    if (blog.classList.contains(slugCat)) {
                        blog.classList.add("active-blogs");

                        const firstHeightMobile = document.querySelector("article .active-blogs");
                        if (blogPage2) {
                            const heightChildrenMobile = firstHeightMobile.children;

                            let totalHeight = 0;
                            for (let i = 0; i < heightChildrenMobile.length; i++) {
                                totalHeight += heightChildrenMobile[i].clientHeight;
                            }
                            firstHeightMobile.parentElement.style.height = totalHeight + 25 + "px";
                            window.onresize = function (event) {
                                firstHeightMobile.parentElement.style.height = totalHeight + 25 + "px";
                            }
                        } else {
                            setElementHeight(firstHeightMobile);
                            window.onresize = function (event) {
                                setElementHeight(firstHeightMobile);
                            }

                        }


                    } else {
                        blog.classList.remove("active-blogs");
                    }


                }
            )
            ;

        });

    }
}