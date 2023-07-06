// const navLinks = document.querySelector(".nav-links");
// const burger = document.querySelector(".burger");

// burger.addEventListener("click", () => {
//     navLinks.classList.toggle("active");
// });


const hamburgerIcon = document.querySelector('#nav-toggler-icon')

const navigation = document.querySelector('.first')

hamburgerIcon.addEventListener('click', toggleNav)
// hamburgerIcon.addEventListener('click', display)


function toggleNav(){
    hamburgerIcon.classList.toggle("active")
    navigation.classList.toggle("active")
    
}


// const ToggleIcon = document.querySelector('.ToggleIcon')
// ToggleIcon.addEventListener("click", function(e){
//     e.preventDefault();
// })






// function display(){
//     if(toggleNav){
//         navigation.style.display = "block";
//     }else{
//         navigation.style.display = "none";
//     }
// }