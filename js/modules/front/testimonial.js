import {add_active_class_loop, add_class} from '../functions';

// ********************************* tab click on testimonial
const testimonial = document.querySelectorAll('person-img');
if (testimonial) {

    testimonial.forEach(person => {

        person.addEventListener('click', () => {
            // add class to element
            const eventName = 'click', className = 'active';
            add_active_class_loop(person, className, testimonial);

            // add class to video section
            const videoContainer = document.querySelectorAll('video-container')
            videoContainer.forEach(video => {

                const ifContent = video.getAttribute('data-id') == person.getAttribute('data-id');
                add_class(ifContent, className);
            })

            // add class in testimonial info section
            const personInfo = document.querySelectorAll('person_info');
            personInfo.forEach(info => {

                const content = info.getAttribute('data-id') == person.getAttribute('data-id');
                add_class(content, className);
            })

        });


    });

}

// play video on clicl
const showVideo = document.querySelector('.video-container.active');
if(showVideo){
    showVideo.addEventListener('click', function () {
        const videoPopup = document.querySelector('video-container.active .video-popup');
        videoPopup.classList.add('active');

        // close popup
        const closePopupButton = videoPopup.querySelector('.close-popup');
        closePopupButton.addEventListener('click', function () {
            videoPopup.classList.remove('active');
        });
    });
}





