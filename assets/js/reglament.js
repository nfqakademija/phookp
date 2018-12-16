import tingle from 'tingle.js';

const modalReglament = new tingle.modal({
    footer: true,
    stickyFooter: true,
    closeMethods: [],
    beforeClose: function () {
        document.querySelector('nav').classList.remove('d-none');
        return true;
    }
});

document.addEventListener("DOMContentLoaded",function(){

    modalReglament.addFooterBtn('Uždaryti', 'tingle-btn tingle-btn--default tingle-btn--pull-right', function(){
        modalReglament.close();
    });
    const rules = document.querySelector('#btn_rules').getAttribute('data-rules');
    modalReglament.setContent(`<div class="text-white h5 mb-2 results-modal__header">Varžybų reglamentas</div><div class="table-responsive js-reglament-table">
        <p class="p-3">${rules}</p></div>`);

});

document.querySelector('#btn_rules').addEventListener('click', function(){
    const reglamentTable = document.querySelector('.js-reglament-table');

    reglamentTable.style.height = screen.height / 1.5+"px";
    document.querySelector('nav').classList.add('d-none');
    modalReglament.open();
});