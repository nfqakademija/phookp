import tingle from 'tingle.js';

const modalReglament = new tingle.modal({
    footer: true,
    stickyFooter: true
});

document.addEventListener("DOMContentLoaded",function(){

    modalReglament.addFooterBtn('Uždaryti', 'tingle-btn tingle-btn--default tingle-btn--pull-right', function(){
        modalStickyFooter.close();
    });
    const rules = document.querySelector('#btn_rules').getAttribute('data-rules');
    modalReglament.setContent(`<div class="text-white h5 mb-2 results-modal__header">Varžybų reglamentas</div><p class="p-3 mb-5">${rules}</p>`);

});

document.querySelector('#btn_rules').addEventListener('click', function(){
    modalReglament.open();
});