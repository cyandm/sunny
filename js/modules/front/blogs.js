// ******************************************tab click for front page

// first height for default reload
function heightFunc(height){
    height.parentElement.style.height = height.clientHeight + "px";
}

const firstHeight = document.querySelector(".active-product");
heightFunc(firstHeight);
window.onresize = function (event) {
    heightFunc(firstHeight);
};

// mobile or large view
let windowWidth = window.innerWidth;
let tabCategory;
if (windowWidth <= 992) {
    tabCategory = document.querySelectorAll(".cat-tab-mobile");
}else{
    tabCategory = document.querySelectorAll(".category-tab");
}
// tab loop landing
tabCategory.forEach((category) => {
    category.addEventListener("click", (e) => {
        console.log(category
        );

        category.classList.add("active-cat");
        tabCategory.forEach((cat) => {
            if (cat != category) {
                cat.classList.remove("active-cat");
            }
        });

        let products = document.querySelectorAll(".tab-product");
        products.forEach((product) => {
            // get slug attribite from category
            let slug = category.getAttribute("data-slug");

            if (product.classList.contains(slug)) {
                product.classList.add("active-product");
                heightFunc(product);
                window.onresize = function (event) {
                    heightFunc(product);
                };
            } else {
                product.classList.remove("active-product");
            }
        });
    });
});

// tab loop for mobile
