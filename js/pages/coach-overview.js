const coaches = document.querySelectorAll(".coaches-content-slide");
if (coaches) {
  coaches.forEach((coach) => {
    const students = coach.querySelectorAll(".student-image");

    students.forEach((student) => {
      student.addEventListener("click", () => {});
    });
  });
}
