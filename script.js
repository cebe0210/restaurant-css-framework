/*cookie*/
function showCookieBanner(){
    let cookieBanner = document.getElementById("cb-cookie-banner");
    cookieBanner.style.display = "block";
}

function hideCookieBanner(){
    localStorage.setItem("cb_isCookieAccepted", "yes");
    let cookieBanner = document.getElementById("cb-cookie-banner");
    cookieBanner.style.display = "none";
}

function initializeCookieBanner(){
    let isCookieAccepted = localStorage.getItem("cb_isCookieAccepted");
    if(isCookieAccepted === null)
    {
    localStorage.setItem("cb_isCookieAccepted", "no");
    showCookieBanner();
    }
    if(isCookieAccepted === "no"){
    showCookieBanner();
    }
    }



/*btn*/
const alertTrigger = document.getElementById('liveAlertBtn');
const liveAlert = document.getElementById('liveAlert');

alertTrigger.addEventListener('click', () => {
    liveAlert.classList.remove('fade'); // Pour afficher l'alerte
    liveAlert.style.display = 'block';
});

// Gérer la fermeture de l'alerte en cliquant sur le bouton de fermeture
const closeBtn = liveAlert.querySelector('.btn-close');
closeBtn.addEventListener('click', () => {
    liveAlert.style.display = 'none';
});
