import tingle from 'tingle.js';


var modal = new tingle.modal({
    footer: true,
    stickyFooter: false,
    closeMethods: ['overlay', 'button', 'escape'],
    closeLabel: "Close",
    cssClass: ['custom-class-1', 'custom-class-2'],
});

modal.addFooterBtn('Uzdaryti', 'tingle-btn tingle-btn--primary', function() {
    // here goes some logic
    modal.close();
});

const top5ResultsTemplate = (number, weigh) => {
    return `<tr>
                <td class="u-bg-main u-text-white">TOP ${number}</td>
                <td class="u-text-bold"> ${weigh}kg</td>
            </tr>
    `;
};

const totalResultsTemplate = (number, weigh, count) => {
    return `<tr>
                <td class="u-bg-main u-text-white">${number}</td>
                <td class="u-text-bold"> ${weigh}kg</td>
                <td class="u-text-bold"> ${count}kg</td>
            </tr>
    `;
};

const buildTop5Table = () =>{
    const newTable = document.createElement('table');
    newTable.classList.add('mdl-data-table');
    return newTable;
};

const buildTotalHeader = () => {
    const newTable = document.createElement('table');
    const tableHeader = document.createElement('thead');
    thead.innerHTML =
        `<tr>
            
         </tr>
        `;
    newTable.classList.add('mdl-data-table');

};

const openResultsModal = (e) => {
    if(window.screen.availWidth <= 768){
        let results = null;
        if(e.currentTarget.hasAttribute('data-results-top5')){
            results = JSON.parse(e.currentTarget.getAttribute('data-results-top5'));

        }
        else if(e.currentTarget.hasAttribute('data-results-total')){
            results = e.currentTarget.getAttribute('data-results-total');

        }else
            return;

        const resultTable = buildTop5Table();

        for (var key in results){
            resultTable.innerHTML += top5ResultsTemplate(parseInt(key)+1, results[key]);
        }

        modal.setContent(resultTable);
        modal.open();
    }
};



const resultRows = document.querySelectorAll('.results-accessor');
console.log(resultRows);
Array.from(resultRows).forEach(function(element) {
    element.addEventListener('click', openResultsModal);
});