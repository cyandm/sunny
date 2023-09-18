function add_active_class_loop(target, className, objectMame) {
    target.classList.add(className);
    objectMame.forEach((item) => {
        if (item != target) {
            item.classList.remove(className);
        }
    });
}


function add_class(ifContent, className) {
    if (ifContent) {
        video.classList.add(className);
    } else {
        video.classList.remove(className);
    }
}