window.onload = () => {

    window.addEventListener('scroll',  (e) => {

        /**
         * @type {Element}
         */
        const nav = document.querySelector('.fixed-top');

        if (document.documentElement.scrollTop || document.body.scrollTop > window.innerHeight) {
            nav.classList.add('nav-colored');
            nav.classList.remove('nav-transparent');
        } else {
            nav.classList.add('nav-transparent');
            nav.classList.remove('nav-colored');
        }
    });

};