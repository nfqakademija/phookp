const menu = document.querySelector('#years');

menu.addEventListener("click", function () {
    console.log(menu);
    if (menu.toggle('active')) {
        document.querySelector('.sideBar').style.width = "15%";
        document.querySelector('#event').style.marginLeft = "15%";
    }
    else {
        document.querySelector('.sideBar').style.width = "0";
        document.querySelector('#event').style.width="0";

    }

});