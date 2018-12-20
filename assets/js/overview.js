const alignTables = () => {
    const resultTable = document.querySelector(".results-table");
    const style = window.getComputedStyle(resultTable, null);
    const width = style.getPropertyValue("width");
    document.querySelector('.js-overview-table').parentElement.style.width = width;
};

alignTables();

