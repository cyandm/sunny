const courseForms = document.querySelectorAll(".course-form-block");
console.log(courseForms);

courseForms.forEach(courseForm => {
    courseForm.addEventListener("click", () => {
        courseForm.classList.toggle("active");

    });

})
