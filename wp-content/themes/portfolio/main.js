let currentlyDisplayed = "presentation";

document.querySelector(".nav__link--right").style.display = "block";
document.querySelector(".nav__link--left").style.display = "none";

document.querySelector(".block--contact").style.display = "block";
document.querySelector(".block--competences").style.display = "block";
document.querySelector(".block--about").style.display = "block";

document.querySelector(".section--competences").style.display = "none";
document.querySelector(".section--contact").style.display = "none";
document.querySelector(".section--about").style.display = "none";

function goToRightDiv(){
    if(currentlyDisplayed === "presentation"){
        displayCompetencesForm();
    } else if(currentlyDisplayed === "competences"){
        displayAboutForm();
    } else if(currentlyDisplayed ==="about"){
        displayContactForm();
    } else if(currentlyDisplayed ==="contact"){
        scrollToProjects();
    }
}

function goToLeftDiv(){
    if(currentlyDisplayed === "contact"){
        displayAboutForm();
    } else if(currentlyDisplayed === "competences"){
        displayPresentationForm();
    } else if(currentlyDisplayed === "projets"){
        displayContactForm();
    } else if(currentlyDisplayed === "about"){
        displayCompetencesForm();
    }
}

function displayContactForm(){
    let competencesContent = document.querySelector(".block--competences");
    let contactForm = document.querySelector(".block--contact");
    let presentationContent = document.querySelector(".block--presentation");
    let aboutContent = document.querySelector(".block--about");

    window.scrollTo({ top: 0, behavior: 'smooth' });

        contactForm.style.left = 'calc(100% + 2px - ' + contactForm.offsetWidth + 'px)';
        presentationContent.style.right = 'calc(750% - 2px)';
        competencesContent.style.left = 'calc(-200% + 2px)';
        aboutContent.style.left = 'calc(-100% + 2px)';

        currentlyDisplayed = "contact";

    document.querySelector(".nav__link--left").style.display = "block";
    document.querySelector(".nav__link--right").style.display = "block";

    document.querySelectorAll(".nav--header .nav--header__link")[0].classList.remove('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[1].classList.remove('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[2].classList.remove('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[3].classList.add('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[4].classList.remove('nav--header__link--active');
}

function displayAboutForm(){
    let aboutContent = document.querySelector(".block--about");
    let competencesContent = document.querySelector(".block--competences");
    let contactForm = document.querySelector(".block--contact");
    let presentationContent = document.querySelector(".block--presentation");

    window.scrollTo({ top: 0, behavior: 'smooth' });

    aboutContent.style.left = 'calc(100% + 2px - ' + aboutContent.offsetWidth + 'px)';
    presentationContent.style.right = 'calc(500% - 2px)';
    competencesContent.style.left = 'calc(-100% + 2px)';
    contactForm.style.left = 'calc(100% + 2px)';

    currentlyDisplayed = "about";

    document.querySelector(".nav__link--left").style.display = "block";
    document.querySelector(".nav__link--right").style.display = "block";

    document.querySelectorAll(".nav--header .nav--header__link")[0].classList.remove('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[1].classList.remove('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[2].classList.add('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[3].classList.remove('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[4].classList.remove('nav--header__link--active');
}

function displayCompetencesForm(){
    let competencesContent = document.querySelector(".block--competences");
    let contactForm = document.querySelector(".block--contact");
    let presentationContent = document.querySelector(".block--presentation");
    let aboutContent = document.querySelector(".block--about");

    window.scrollTo({ top: 0, behavior: 'smooth' });

        competencesContent.style.left = 'calc(100% - ' + competencesContent.offsetWidth + 'px + 2px)';
        presentationContent.style.right = 'calc(250% - 2px)';
        contactForm.style.left = 'calc(200% + 2px)';
        aboutContent.style.left = 'calc(100% + 2px)';

        currentlyDisplayed = "competences";

    document.querySelector(".nav__link--left").style.display = "block";
    document.querySelector(".nav__link--right").style.display = "block";

    document.querySelectorAll(".nav--header .nav--header__link")[0].classList.remove('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[1].classList.add('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[2].classList.remove('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[3].classList.remove('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[4].classList.remove('nav--header__link--active');
}

function displayPresentationForm(){
    let competencesContent = document.querySelector(".block--competences");
    let contactForm = document.querySelector(".block--contact");
    let presentationContent = document.querySelector(".block--presentation");
    let aboutContent = document.querySelector(".block--about");

    window.scrollTo({ top: 0, behavior: 'smooth' });

        presentationContent.style.right = '0px';
        competencesContent.style.left = 'calc(100% - 2px)';
        contactForm.style.left = 'calc(300% + 2px)';
        aboutContent.style.left = 'calc(200% + 2px)';

        currentlyDisplayed = "presentation";

    document.querySelector(".nav__link--left").style.display = "none";
    document.querySelector(".nav__link--right").style.display = "block";

    document.querySelectorAll(".nav--header .nav--header__link")[0].classList.add('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[1].classList.remove('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[2].classList.remove('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[3].classList.remove('nav--header__link--active');
    document.querySelectorAll(".nav--header .nav--header__link")[4].classList.remove('nav--header__link--active');
}

function scrollToProjects(){
    document.querySelector(".nav__link--left").style.display = "block";
    document.querySelector(".nav__link--right").style.display = "none";

    currentlyDisplayed = "projets";
    window.scrollTo({ top: window.innerHeight, behavior: 'smooth' });
}

function scrollToTop(){
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function changeJavascriptElements(){
    let withoutJavascriptElements = document.querySelectorAll('.withoutJavascript');
    for (let i = 0; i < withoutJavascriptElements.length; i++) {
        withoutJavascriptElements[i].className = withoutJavascriptElements[i].className.replace('withoutJavascript', 'fade-in-animation');
    }
    fadeInAnimation();
}

function fadeInAnimation() {
    let hiddenElements = document.querySelectorAll('.fade-in-animation');
    let windowHeight = window.innerHeight;
    for (let i = 0; i < hiddenElements.length; i++) {
            let positionFromTop = hiddenElements[i].getBoundingClientRect().top;
            if (positionFromTop - windowHeight <= -100) {
                hiddenElements[i].className = hiddenElements[i].className.replace('fade-in-animation', 'fade-in-element');
            }
        }
}

function windowResize(){
    if(currentlyDisplayed === "contact"){
        displayContactForm();
    } else if(currentlyDisplayed === "competences"){
        displayCompetencesForm();
    } else if(currentlyDisplayed === "presentation"){
        displayPresentationForm();
    } else if(currentlyDisplayed === "about"){
        displayAboutForm();
    }
    fadeInAnimation();
}

let active = false;

function activateLightBoxEffect(image) {
        let body = document.querySelector("body");
        let lightBox = document.querySelector('#lightbox');
        let content = document.querySelector('#lightbox .content');
        active = false;
        let windowWidth = window.innerWidth;
        if(active === false && windowWidth > 720){
            let element = image;
            let imageElement = document.createElement("img");
            let sliceSource = element.getAttribute('src').slice(0, -12);
            let newImageSource = sliceSource + '.png';
            imageElement.setAttribute("src", newImageSource);
            imageElement.setAttribute("alt", element.getAttribute('alt'));
            imageElement.setAttribute("class", element.getAttribute('class'));
            content.appendChild(imageElement);
            lightBox.classList.toggle('lightbox--off');
            active = true;
            body.style.overflowY = "hidden";
        }
}

function desactiveLightBox(){
    let body = document.querySelector("body");
    let lightBox = document.querySelector('#lightbox');
    let content = document.querySelector('#lightbox .content');
    if(active === true){
        lightBox.classList.toggle('lightbox--off');
        content.removeChild(content.lastChild);
        active = false;
        body.style.overflowY = "initial";
    }
}

function checkForm(){
    let contactForm = document.querySelector('#contactForm');
    let nameInput = document.querySelector('#nom');
    let surnameInput = document.querySelector('#prenom');
    let emailInput = document.querySelector('#email');
    let messageInput = document.querySelector('#message');
    let errorFeedback = document.querySelector('#error');

    let errorArray = [];
    if(nameInput.value === ""){
        nameInput.classList.add('invalid');
        errorArray.push('error');
    } else {
        nameInput.classList.remove('invalid');
    }
    if(surnameInput.value === ""){
        surnameInput.classList.add('invalid');
        errorArray.push('error');
    } else {
        surnameInput.classList.remove('invalid');
    }
    if(!emailInput.checkValidity() || emailInput.value ===""){
        emailInput.classList.add('invalid');
        errorArray.push('error');
    } else {
        emailInput.classList.remove('invalid');
    }
    if(messageInput.value === ""){
        messageInput.classList.add('invalid');
        errorArray.push('error');
    } else {
        messageInput.classList.remove('invalid');
    }

    if(errorArray.length === 0){
        contactForm.submit();
    } else {
        errorFeedback.innerHTML = "Les champs entourés en rouge n'ont pas été remplis correctement";
    }
}

document.querySelectorAll(".nav--header .nav--header__link")[0].addEventListener("click", displayPresentationForm);
document.querySelectorAll(".nav--header .nav--header__link")[1].addEventListener("click", displayCompetencesForm);
document.querySelectorAll(".nav--header .nav--header__link")[2].addEventListener("click", displayAboutForm);
document.querySelectorAll(".nav--header .nav--header__link")[3].addEventListener("click", displayContactForm);
document.querySelectorAll(".nav--header .nav--header__link")[4].addEventListener("click", scrollToProjects);

document.querySelector(".header .nav .nav__image").addEventListener("click", scrollToTop);
document.querySelector(".nav__link--right").addEventListener("click", goToRightDiv);
document.querySelector(".nav__link--left").addEventListener("click", goToLeftDiv);
document.querySelector(".nav__link--bottom").addEventListener("click", scrollToProjects);

window.addEventListener('keydown', function (e) {
    let key = e.which || e.keyCode;
    if (key === 37) { // Left Arrow
        goToLeftDiv();
    } else if (key === 39){ // Right Arrow
        goToRightDiv();
    }
});

changeJavascriptElements();
window.addEventListener('scroll', fadeInAnimation);
window.addEventListener('resize', windowResize);


let imageArray = document.querySelectorAll('.block__image');
for (let i = 0; i < imageArray.length; i++) {
    (function () {
        let image = imageArray[i];
        image.addEventListener("click", function() { activateLightBoxEffect(image); }, false);
    }());
}

let background = document.querySelector('#lightbox .background');
let closeButton = document.querySelector('#lightbox .icon--cancel');
background.addEventListener('click', desactiveLightBox);
closeButton.addEventListener('click', desactiveLightBox);

let submitButton = document.querySelector('#contactButton');
submitButton.addEventListener('click', checkForm);