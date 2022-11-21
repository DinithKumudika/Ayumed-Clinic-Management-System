const burgerBtn = document.querySelector(".menu-btn");
const navBar = document.querySelector(".nav-links");
const navLinks =  document.querySelectorAll(".nav-link");
const nav = document.getElementById("nav");

burgerBtn.addEventListener('click', function () {
    navBar.classList.toggle('slidenav');
});

const firstBannerText = document.getElementById("text-1");
const secondBannerText = document.getElementById("text-2");
const bannerBtn1 = document.getElementById("banner-btn-register");
const bannerBtn2 = document.getElementById("banner-btn-login");


document.addEventListener('scroll', function(){
    nav.style.backgroundColor = "green";
    navLinks.forEach(function (navLink){
        navLink.style.color = "var(--light)";
    })
});

document.addEventListener('scroll', function(){
    firstBannerText.classList.add('text-anim-1');
    firstBannerText.style.marginLeft = "60px";
})
document.addEventListener('scroll', function(){
    secondBannerText.classList.add('text-anim-2');
    secondBannerText.style.marginLeft = "120px";
})



document.addEventListener('scroll', function(){
    bannerBtn1.classList.add('button-anim');
    bannerBtn1.style.opacity = "1";
    bannerBtn2.classList.add('button-anim');
    bannerBtn2.style.opacity = "1";
});

const contactForm = document.getElementById("contact-form");
const nameField = document.getElementById("name-input");
const emailField = document.getElementById("email-input");
const messageField = document.getElementById("msg-input");