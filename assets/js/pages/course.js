const catNameGroup = document.querySelectorAll(
  '.class-categories .category-class'
);
const tabClasses = document.querySelectorAll('.class-card-wrapper');

const singleCourse = document.querySelector('.courses-page');

const setHeightClassContainer = () => {
  if (singleCourse) {
    const tabClass = document.querySelector('.class-card-wrapper.active');
    const containerClassTabs = document.querySelector('.class-card-container');

    containerClassTabs.style.setProperty(
      '--height',
      tabClass.offsetHeight + 10 + 'px'
    );
  }
};

if (singleCourse) {
  if (catNameGroup) {
    catNameGroup.forEach((cat) => {
      cat.addEventListener('click', () => {
        catNameGroup.forEach((elGroup) => {
          elGroup.classList.remove('active');
        });
        cat.classList.add('active');
        if (tabClasses) {
          tabClasses.forEach((tab) => {
            tab.classList.remove('active');

            if (tab.dataset.tab === cat.dataset.tab) {
              tab.classList.add('active');
            }
          });
        }
        setHeightClassContainer();
      });
    });
  }
  setHeightClassContainer();
}
