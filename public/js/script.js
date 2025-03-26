
const navHamburger = document.getElementById('navHamburger')
const hamburgerMenu = document.getElementById('hamburgerMenu')




const locationCard = document.querySelector('.location-card')





navHamburger.addEventListener('click', () => {
    hamburgerMenu.style.top = '0px'
    let cross = hamburgerMenu.querySelector('.cross')
    cross.addEventListener('click', () => {
        hamburgerMenu.style.top = '-600px';
    })
})





locationCard.addEventListener('click', () => {
    window.open("https://www.google.com/maps/place/TA+NAJ+Zmrzlina,+Sobotské+námestie+14,+058+01+Poprad-Spišská+Sobota/@49.0656912,20.3140572,17z/data=!4m6!3m5!1s0x473e3b50cc870555:0x464c25529e287332!8m2!3d49.0656912!4d20.3140572!16s%2Fg%2F11sx41bqd3?hl=en&gl=SK", "_blank")
})
