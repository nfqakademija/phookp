import tingle from 'tingle.js';

const modalFinishConfirmation = new tingle.modal({
    closeMethods: [],
    footer: true,
    stickyFooter: true
});
const button = document.querySelector('.js-finish-competition');

 button.addEventListener('click', function(){
    modalFinishConfirmation.open();
});
modalFinishConfirmation.setContent(`<p class="text-center h5 py-3">Ar tikrai norite <u>užbaigti</u> varžybas?</p>`);

modalFinishConfirmation.addFooterBtn('Atšaukti', 'tingle-btn tingle-btn--success tingle-btn--pull-right', function(){
    modalFinishConfirmation.close();
});
modalFinishConfirmation.addFooterBtn('Užbaigti', 'tingle-btn u-bg-main tingle-btn--pull-right', function(){
    const link = button.getAttribute('data-link');
    window.location.replace(link);
});

