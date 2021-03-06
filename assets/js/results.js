import tingle from 'tingle.js';


const modal = new tingle.modal({
    footer: true,
    stickyFooter: true,
    closeMethods: [],
    closeLabel: "U&#382;daryti",
    cssClass: ['custom-class-1', 'custom-class-2'],
});

modal.addFooterBtn('Uždaryti', 'results-modal__button', function() {
    // here goes some logic
    modal.close();
});

const modalHeader = (team) => {
    return `<div class="text-white h5 mb-2 results-modal__header">
            ${team} tarpiniai rezultatai</div>`;
};

const top5ResultsTemplate = (number, weigh) => {
    return `<tr>
                <td class="u-bg-main u-text-white">TOP ${number}</td>
                <td class="u-text-bold"> ${weigh} kg</td>
            </tr>
    `;
};

const buildTop5Table = (results) =>{
    const newTable = document.createElement('table');
    newTable.className = 'table table-bordered';

    for (let i = 0; i< 5; i++){
        let res = 0;
        if(typeof results[i] !== 'undefined')
            res = results[i];

        newTable.innerHTML += top5ResultsTemplate(parseInt(i)+1, res);
    }
    return newTable.outerHTML;
};

const buildTotalHeader = () => {
    return `<table class="w-100"><tr class="row mx-0 u-bg-main text-white u-text-bold">
                <th class="col-4">Svėrimo nr.</th>
                <th class="col-4">Svoris (kg)</th>
                <th class="col-4">Žuvų skaičius</th>
            </tr></table>`;
};

const totalResultsTemplate = (number, weigh, count) => {
    return `<tr class="row mx-0">
                <td class="col-4 u-bg-main u-text-white">${number}</td>
                <td class="col-4 u-text-bold"> ${weigh}</td>
                <td class="col-4 u-text-bold"> ${count}</td>
            </tr>
    `;
};

const buildTotalTable = (weighings) => {
    const container = document.createElement('div');
    container.className = 'table-responsive js-modal-table';
    const table = document.createElement('table');
    table.className = "w-100";
    for(let i = 0; i < weighings.length; i++){
        table.innerHTML+=totalResultsTemplate(parseInt(i)+1, weighings[i]['totalWeigh'], weighings[i]['fishCount']);
    }
    container.appendChild(table);
    return buildTotalHeader()+container.outerHTML;
};

const openResultsModal = (e) => {
    if(window.screen.availWidth <= 768){
        const team = e.currentTarget.getAttribute('data-team-name');
        let modalContent = null;
        if(e.currentTarget.hasAttribute('data-results-top5')){
            modalContent = buildTop5Table(JSON.parse(e.currentTarget.getAttribute('data-results-top5')));
        }
        else if(e.currentTarget.hasAttribute('data-results-total')){
            const results = JSON.parse(e.currentTarget.getAttribute('data-results-total'));
            modalContent = buildTotalTable(results);
        }else
            return;

        modal.setContent(modalHeader(team) + modalContent);
        const resultsTable = document.querySelector('.js-modal-table');
        if(resultsTable){
            resultsTable.style.height = screen.height / 1.5+"px";
        }


        modal.open();
    }
};

const resultRows = document.querySelectorAll('.js-results-accessor');
Array.from(resultRows).forEach(function(element) {
    element.addEventListener('click', openResultsModal);
});
