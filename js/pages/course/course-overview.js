const courseForms = document.querySelectorAll(".course-form-block");
if (courseForms) {
    courseForms.forEach(courseForm => {

        const showForm = courseForm.querySelector('.show-form');
        const formCode = courseForm.querySelector('.course-form');
        const detailsCourse = courseForm.querySelector('.details-course');
        showForm.addEventListener("click", () => {

            formCode.classList.add("active");
            showForm.classList.add("active");

        });
        detailsCourse.addEventListener("click", () =>{
            formCode.classList.remove("active");
            showForm.classList.remove("active");
        })
    })

}


