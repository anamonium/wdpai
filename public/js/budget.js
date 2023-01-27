const costNameInput = document.querySelector('input[placeholder = "Cost name"]');
const costPriceInput = document.querySelector('input[placeholder = "Cost price"]');
const addCostButton = document.querySelector("#baInput");

const deleteButton = document.querySelectorAll(".fa-trash");
const budgetLeft = document.querySelector("#budLef");

const budgetContainer = document.querySelector(".bItems");

function deleteBudgetItem() {
    const budItem = this;
    const container = budItem.parentElement.parentElement;
    const id = container.getAttribute("id");

    const cost = container.childNodes.item(3);

    fetch(`/deleteBudgetItem/${id}`)
        .then(function (){
            budgetLeft.innerHTML = parseFloat(budgetLeft.innerHTML) + parseFloat(cost.innerHTML);
            container.remove();
        });
}

function addCostItem() {
    const budgetNameCost = costNameInput.value;
    let priceInput = costPriceInput.value;
    const valPIn = parseFloat(priceInput);

    fetch("/addBudgetItem", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({"name": budgetNameCost, "cost": valPIn})
    }).then(function (response) {
        return response.json();
    }).then(function (budget){
        budgetLeft.innerHTML = parseFloat(budgetLeft.innerHTML) - valPIn;
        createBudget(budget, budgetNameCost, valPIn);
        costPriceInput.value= "";
        costNameInput.value="";
    });

}


function createBudget(budget_id, content, cost){
    const template = document.querySelector("#newBudget");
    const clone = template.content.cloneNode(true);
    const tr = clone.querySelector(".budgetItem");

    tr.id = budget_id;

    const nameField = clone.querySelector(".name");
    nameField.innerHTML = content;

    const costField = clone.querySelector(".cost");
    costField.innerHTML = cost;

    clone.querySelector(".fa-trash").addEventListener("click", deleteBudgetItem);

    budgetContainer.appendChild(clone);
}


addCostButton.addEventListener("click", addCostItem);
deleteButton.forEach(button => button.addEventListener("click", deleteBudgetItem));
