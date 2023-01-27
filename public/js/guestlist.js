const plusOneButtonConfirm = document.querySelectorAll(".gPlusOne>.fa-square-check")
const plusOneButtonNotConfirm = document.querySelectorAll(".gPlusOne>.fa-square")

const statusButtonConfirm = document.querySelectorAll(".gStatus>.fa-square-check")
const statusButtonNotConfirm = document.querySelectorAll(".gStatus>.fa-square")

const deleteButton = document.querySelectorAll(".fa-trash");

const addGuestButton = document.querySelector("#addGuest");
const addGuestName = document.querySelector("#guestName");
const addGuestSurname = document.querySelector("#guestSurname");
const addGuestPhone = document.querySelector("#guestPhone");

const invitedInfo = document.querySelector("#invInf");
const acceptedInfo = document.querySelector("#confInf");

const tableContainer = document.querySelector("tbody");



function changePlusOne(){
    const status = this;
    const container = status.parentElement.parentElement;
    const id = container.getAttribute("id");

    const st = container.childNodes.item(5).childNodes.item(1);

    fetch(`/updatePlusOne/${id}`)
        .then(function (){
            if(status.className === "fas fa-square") {

                status.className = "fas fa-square-check"
                if(st.className === "fas fa-square-check"){
                    invitedInfo.innerHTML = parseInt(invitedInfo.innerHTML) + 1;
                    acceptedInfo.innerHTML = parseInt(acceptedInfo.innerHTML) + 1;
                }else{
                    invitedInfo.innerHTML = parseInt(invitedInfo.innerHTML) + 1;
                }

            }else{
                status.className = "fas fa-square"
                if(st.className === "fas fa-square-check"){
                    invitedInfo.innerHTML = parseInt(invitedInfo.innerHTML) - 1;
                    acceptedInfo.innerHTML = parseInt(acceptedInfo.innerHTML) - 1;
                }else{
                    invitedInfo.innerHTML = parseInt(invitedInfo.innerHTML) - 1;
                }
            }
        });
}

function changeGuestStatus(){
    const status = this;
    const container = status.parentElement.parentElement;
    const id = container.getAttribute("id");

    const st = container.childNodes.item(3).childNodes.item(1);

    fetch(`/updateStatus/${id}`)
        .then(function (){
            if(status.className === "fas fa-square") {
                status.className = "fas fa-square-check"
                if(st.className === "fas fa-square-check"){
                    acceptedInfo.innerHTML = parseInt(acceptedInfo.innerHTML) + 2;
                }else{
                    acceptedInfo.innerHTML = parseInt(acceptedInfo.innerHTML) + 1;
                }
            }else{
                status.className = "fas fa-square"
                if(st.className === "fas fa-square-check"){
                    acceptedInfo.innerHTML = parseInt(acceptedInfo.innerHTML) - 2;
                }else{
                    acceptedInfo.innerHTML = parseInt(acceptedInfo.innerHTML) - 1;
                }
            }
        });
}

function addGuest() {

    const name = addGuestName.value;
    const phone = addGuestPhone.value;
    const surname = addGuestSurname.value;


    fetch("/addGuest", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({"name": name, "surname": surname, "phone": phone})
    }).then(function (response) {
        return response.json();
    }).then(function (Guest){
        createGuest(Guest, name + " " + surname, phone);
        invitedInfo.innerHTML = parseInt(invitedInfo.innerHTML) + 1;
        addGuestName.value = "";
        addGuestPhone.value = "";
        addGuestSurname.value = "";
    });

}


function deleteGuest() {
    const temp = this;
    const container = temp.parentElement.parentElement;
    const id = container.getAttribute("id");

    const st = container.childNodes.item(3).childNodes.item(1);
    const pO = container.childNodes.item(5).childNodes.item(1);

    fetch(`/deleteGuest/${id}`)
        .then(function (){
            container.remove();
            if(pO.className === "fas fa-square-check"){
                if(st.className === "fas fa-square-check"){
                    invitedInfo.innerHTML = parseInt(invitedInfo.innerHTML) - 2;
                    acceptedInfo.innerHTML = parseInt(acceptedInfo.innerHTML) - 2;
                }
                else{
                    invitedInfo.innerHTML = parseInt(invitedInfo.innerHTML) - 1;
                    acceptedInfo.innerHTML = parseInt(acceptedInfo.innerHTML) - 1;
                }

            }else{
                if(st.className === "fas fa-square-check"){
                    invitedInfo.innerHTML = parseInt(invitedInfo.innerHTML) - 2;
                }
                else{
                    invitedInfo.innerHTML = parseInt(invitedInfo.innerHTML) - 1;
                }
            }
        });
}

function createGuest(guest_id, name, phone){
    const template = document.querySelector("#newGuest");
    const clone = template.content.cloneNode(true);
    const tr = clone.querySelector("tr");

    tr.id = guest_id;

    const nameField = clone.querySelector(".gName");
    nameField.innerHTML = name;

    const phoneField = clone.querySelector(".gPhone");
    phoneField.innerHTML = phone;

    clone.querySelector(".gStatus>.fa-square").addEventListener("click", changeGuestStatus);
    clone.querySelector(".gPlusOne>.fa-square").addEventListener("click", changePlusOne);
    clone.querySelector(".fa-trash").addEventListener("click", deleteGuest);

    tableContainer.appendChild(clone);
}


plusOneButtonConfirm.forEach(button => button.addEventListener("click", changePlusOne));
plusOneButtonNotConfirm.forEach(button => button.addEventListener("click", changePlusOne));

statusButtonConfirm.forEach(button => button.addEventListener("click", changeGuestStatus));
statusButtonNotConfirm.forEach(button => button.addEventListener("click", changeGuestStatus));

addGuestButton.addEventListener("click", addGuest);

deleteButton.forEach(button => button.addEventListener("click", deleteGuest));


