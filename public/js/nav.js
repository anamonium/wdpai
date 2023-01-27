const navContainer = document.querySelector("nav");
const navButton = document.querySelector(".fa-bars")

function showNav() {
    if(navContainer.style.display === "none")
        navContainer.style.display = "";
    else
        navContainer.style.display = "none";
}

navButton.addEventListener("click", showNav);