const resultFieldsCount = () => {
    const parent = document.querySelector('.results-entry-container');
    return parent.childElementCount-1;
};

const generateResultsFormHtml = () => {
    const id = resultFieldsCount();
    return `<div>
                <input type="text" 
                    id="weighing_results_${id}_weigh" 
                    name="weighing[results][${id}][weigh]" 
                    placeholder="Žuvis (g.)" 
                    class="text-box text-box--results">
            </div> 
            <div class="ml-1">
                <div>
                    <label for="weighing_results_${id}_specialFish">Amuras</label>
                    <input type="checkbox" 
                        id="weighing_results_${id}_specialFish" 
                        name="weighing[results][${id}][specialFish]" 
                        class="check-box" value="1">
                </div>
            </div>`;
};

const createNewInput = () => {
    const plusButton = document.querySelector('#addButton');
    const newNode = document.createElement('div');

    newNode.classList.add('m-0');
    newNode.innerHTML = generateResultsFormHtml();
    plusButton.before(newNode);
    newNode.querySelector('.text-box').focus();
};

document.querySelector("#addButton").addEventListener("click", createNewInput);