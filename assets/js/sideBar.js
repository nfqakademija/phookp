const menu = document.querySelector('#open');
const close = document.querySelector('#close');

menu.addEventListener("click", function () {
    const e=document.querySelector('#mySidenav');
    document.querySelector('#mySidenav').style.width = "30%";
});

close.addEventListener("click", function () {
        document.querySelector('#mySidenav').style.width = "0";
});