const positionFooter = () => {
    const screenHeigh = window.outerHeight;
    const footer = document.querySelector(".footer");
    footer.style.marginTop = (screenHeigh - footer.style.height)+"px";
    console.log("Repositioned footer...");
}

positionFooter();

document.addEventListener("scroll", positionFooter);