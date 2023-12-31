function onToggleMenu(e){
    const navLinks = document.querySelector('.navLinks')
    e.name = e.name === "menu-outline" ? "close" : "menu-outline"
    navLinks.classList.toggle('top-[100%]')
}
