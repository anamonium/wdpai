const editButton = document.querySelectorAll(".fa-pencil");
let budgetCont = document.querySelector("#budgetText");
let dateCont = document.querySelector("#weddingText");

const logOutButton = document.querySelector("#logOutButton");

function editItem() {
    const item = this;
    const container = item.parentElement;

    if(container.className === "weddingDateChanger"){

        dateCont.contentEditable = true;
        dateCont.addEventListener("keyup", function(event){
            if (event.key === "Enter") {
                event.preventDefault();
                dateCont.contentEditable = false;
                let data = dateCont.innerHTML;
                let splited = data.split('<br>');

                if(splited){
                    fetch("/editDate", {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(splited[0])
                    }).then(function () {
                        dateCont.innerHTML = splited[0];
                    })
                }
            }
        });

    }
    else if(container.className === "budgetChanger"){

        budgetCont.contentEditable = true;

        budgetCont.addEventListener("keyup", function(event){
            if (event.key === "Enter") {
                event.preventDefault();
                budgetCont.contentEditable = false;
                let data = budgetCont.innerHTML;
                let splited = data.split('<br>');
                const budget = parseFloat(splited[0]);
                if(budget){
                    fetch("/editBudget", {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(budget)
                    }).then(function () {
                        budgetCont.innerHTML = budget;
                    })
                }
            }
        });

    }
}

function logOut() {
    document.cookie = 'logged_user' + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    location.reload();
}

logOutButton.addEventListener("click", logOut);
editButton.forEach(button => button.addEventListener("click", editItem));